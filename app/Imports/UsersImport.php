<?php

namespace App\Imports;

use App\Models\User;
use DateTime;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithStartRow, WithCustomCsvSettings
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $artistName = $row[1];
        $artistName = preg_replace('/\s+/', '', $artistName);
        return new User([
            //
            
            "name" => $row[1] ,
            "username" => $artistName,
            "email" => $artistName."@gmail.com",
            "role_id" => 2, // User Type Artist
            "region_id" => 1,
            "birthdate" => DateTime::createFromFormat('Y' , '2000'),
            "password" => Hash::make($artistName)
        ]);
    }
} 