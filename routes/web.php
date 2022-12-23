<?php

use App\Http\Controllers\SongController;
use App\Imports\SongsImport;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Models\User;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/importUsers', function () {
    
    return view('import/importUsers' , [
        'users' => User::all()->slice(0 , 1000)
    ]);
});
Route::get('/importSongs', function () {
    $songs = Song::all()->skip(100)->take(100) ;
    
    return view('import/importSongs' , compact('songs'));
});

Route::post('importUsers', function () {
    Excel::import(new UsersImport, request()->file('file'));
    return redirect()->back()->with('success','Data Imported Successfully');
});
Route::post('importSongs', function () {
    Excel::import(new SongsImport, request()->file('file'));
    return redirect()->back()->with('success','Data Imported Successfully');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/songs', [App\Http\Controllers\SongController::class, 'view'])->name('songs');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/myPlaylists', [App\Http\Controllers\PlaylistController::class, 'view'])->name('myPlaylists');

Route::get('/play', [App\Http\Controllers\SongController::class, 'play'])->name('play');

Route::get('/viewSongs/{number}', [App\Http\Controllers\SongController::class, 'view'])->name('view Songs');

Route::post('/searchSongs/{number}', [App\Http\Controllers\SearchController::class, 'searchSongs'])->name('search Songs');
Route::get('/searchSongs/{number}', [App\Http\Controllers\SearchController::class, 'searchSongs'])->name('search Songs');

Route::get('/viewPlaylists', [App\Http\Controllers\PlaylistController::class, 'view'])->name('view Playlists');
Route::get('/viewGroups', [App\Http\Controllers\GroupController::class, 'view'])->name('view Groups');
Route::get('/viewListened/{number}', [App\Http\Controllers\ListenedController::class, 'view'])->name('view Listened');


Route::get('/Playlist/play/{playlist}' , [App\Http\Controllers\PlaylistController::class, 'play'])->name('play Playlist');
Route::get('/welcome' , [App\Http\Controllers\SearchController::class, 'find'])->name('welcome');
//Route::post('/search' , [App\Http\Controllers\SearchController::class, 'findSearch'])->name('search');


///// Groups
//Route::get('/viewGroups' , [App\Http\Controllers\PlaylistController::class, 'play'])->name('play Playlist');
Route::get('/addGroup' , [App\Http\Controllers\GroupController::class, 'viewForm'])->name('add Group');
Route::get('/storeGroup' , [App\Http\Controllers\GroupController::class, 'store'])->name('store Group');
Route::get('/createPlaylist' , [App\Http\Controllers\PlaylistController::class, 'viewForm'])->name('create Playlist');
Route::post('/createPlaylist' , [App\Http\Controllers\PlaylistController::class, 'create'])->name('create Playlist');
Route::get('/addtoPlaylist' , [App\Http\Controllers\PlaylistController::class, 'add'])->name('add song to playlist') ;


Route::get('/viewGroup/{group}', [App\Http\Controllers\GroupController::class, 'view'])->name('view Group');
