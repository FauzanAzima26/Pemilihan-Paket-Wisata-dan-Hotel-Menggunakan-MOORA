<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\BobotKriteriaController;
use App\Http\Controllers\HasilRekomendasiController;
use App\Models\Hotel;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('paket/wisata/data', [PaketWisataController::class, 'getData'])->name('paket.wisata.data');
Route::resource('paket/wisata', PaketWisataController::class)->names('paket.wisata');

Route::get('paket/wisata/data', [HotelController::class, 'getData'])->name('hotel.data');
Route::resource('hotel', HotelController::class)->names('hotel');

Route::resource('bobot/kriteria', BobotKriteriaController::class)->names('bobot.kriteria');

Route::resource('proses', ProsesController::class)->names('proses');

Route::resource('hasil/rekomendasi', HasilRekomendasiController::class)->names('hasil.rekomendasi');

