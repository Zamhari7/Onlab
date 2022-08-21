<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Aslab\MahasiswaController;
use App\Http\Controllers\Aslab\VideoController;
use App\Http\Controllers\Aslab\ModulController;
use App\Http\Controllers\Aslab\TugasController;
use App\Http\Controllers\FileTugasController;
use App\Http\Controllers\NilaiController;



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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    // Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);

    Route::get('/video/download/', [VideoController::class, 'download'])->name('video.download');
    Route::get('/modul/download/', [ModulController::class, 'download'])->name('modul.download');
    Route::get('/tugas/download/', [TugasController::class, 'download'])->name('tugas.download');
    Route::get('/fileTugas/download/', [FileTugasController::class, 'download'])->name('fileTugas.download');
    Route::post('/fileTugas/update-nilai/', [FileTugasController::class, 'update_nilai'])->name('fileTugas.update-nilai');
    Route::post('/nilai/simpan-nilai/', [NilaiController::class, 'simpan_nilai'])->name('nilai.simpan-nilai');
    Route::post('/nilai/nilai-total/{$id}', [NilaiController::class, 'nilai_total'])->name('nilai.nilai_total');

    Route::post('/nilai/simpan-nilai-dosbim/', [NilaiController::class, 'simpan_nilai_dosbim'])->name('nilai.simpan-nilai-dosbim'); //simpan nilai dosbim di dosbim

    Route::get('mahasiswa/bimbingan', [MahasiswaController::class, 'bimbingan'])->name('mahasiswa.bimbingan');

    Route::resource('fileTugas', App\Http\Controllers\FileTugasController::class);
    Route::resource('nilai', App\Http\Controllers\NilaiController::class);
    Route::resource('nilaiTotal', App\Http\Controllers\NilaiTotalController::class);
    Route::resource('tugas', App\Http\Controllers\Aslab\TugasController::class);

    Route::group(['middleware' => ['checkRole:aslab,kalab']], function () {

        // template //
        Route::get('upgrade', function () {
            return view('pages.upgrade');
        })->name('upgrade');
        Route::get('map', function () {
            return view('pages.maps');
        })->name('map');
        Route::get('icons', function () {
            return view('pages.icons');
        })->name('icons');
        Route::get('table-list', function () {
            return view('pages.tables');
        })->name('table');
        Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
        // template //


        // Route::get('/video/download/', [VideoController::class, 'download'])->name('video.download');
        // Route::get('/modul/download/', [ModulController::class, 'download'])->name('modul.download');
        // Route::get('/tugas/download/', [TugasController::class, 'download'])->name('tugas.download');

        Route::resource('praktikum', App\Http\Controllers\Aslab\PraktikumController::class);
        Route::resource('kelas', App\Http\Controllers\Aslab\KelasController::class);
        Route::resource('dosbim', App\Http\Controllers\Aslab\DosbimController::class);
        Route::resource('aslab', App\Http\Controllers\Aslab\AslabController::class);
        Route::resource('mahasiswa', App\Http\Controllers\Aslab\MahasiswaController::class);

        Route::resource('modul', App\Http\Controllers\Aslab\ModulController::class);
        Route::resource('artikel', App\Http\Controllers\Aslab\ArtikelController::class);
        Route::resource('video', App\Http\Controllers\Aslab\VideoController::class);

        // Route::resource('tugas', App\Http\Controllers\Aslab\TugasController::class);
    });

    Route::group(['middleware' => ['checkRole:mahasiswa']], function () {
        Route::get('dashboard', function () {
            return view('role.mahasiswa.dashboard');
        });

        // Route::get('fileTugas/store', [FileTugasController::class, 'store'])->name('fileTugas.store');

        Route::resource('modul-mahasiswa', App\Http\Controllers\Mahasiswa\ModulController::class);
        Route::resource('artikel-mahasiswa', App\Http\Controllers\Mahasiswa\ArtikelController::class);
        Route::resource('video-mahasiswa', App\Http\Controllers\Mahasiswa\VideoController::class);

        Route::resource('tugas-mahasiswa', App\Http\Controllers\Mahasiswa\TugasController::class);
    });

    Route::group(['middleware' => ['checkRole:dosbim']], function () {
        Route::get('dashboard', function () {
            return view('role.dosen.dashboard');
        });

        // Route::resource('tugas-dosbim', App\Http\Controllers\Dosbim\TugasController::class);
    });

    Route::group(['middleware' => ['checkRole:kalab']], function () {
        Route::resource('plotting', App\Http\Controllers\Kalab\PlottingController::class);
    });
});
