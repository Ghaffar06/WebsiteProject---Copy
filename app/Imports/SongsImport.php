<?php

namespace App\Imports;
use Ramsey\Uuid\Type\Integer;
use App\Models\Song;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;

class SongsImport implements ToModel
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
        $id = ($row[16]-20230+1);
        return new Song([
            //
                "name" => $row[1],
                "feature_id" => $row[0],
                "user_id" => $id,
                "type_id" => 1, 
        ]);
    }
}
