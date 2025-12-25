<?php

use App\Models\Hotel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\MooraController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\BobotKriteriaController;
use App\Http\Controllers\HasilRekomendasiController;


Route::get('paket/wisata/data', [PaketWisataController::class, 'getData'])->name('paket.wisata.data');
Route::resource('/', PaketWisataController::class)->names('paket.wisata');

Route::get('hotel/data', [HotelController::class, 'getData'])->name('hotel.data');
Route::resource('hotel', HotelController::class)->names('hotel');

Route::get('bobot/kriteria/data', [BobotKriteriaController::class, 'getData'])->name('bobot.kriteria.data');
Route::resource('bobot/kriteria', BobotKriteriaController::class)->names('bobot.kriteria');

Route::get('proses/data', [ProsesController::class, 'data'])->name('proses.data');
Route::get('/proses/{tipe}', [ProsesController::class, 'hitung'])
    ->name('proses.hitung');
Route::resource('proses', ProsesController::class)->names('proses');

Route::resource('hasil/rekomendasi', HasilRekomendasiController::class)->names('hasil.rekomendasi');

