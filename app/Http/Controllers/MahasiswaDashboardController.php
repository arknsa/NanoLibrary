<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActiveUser;

class MahasiswaDashboardController extends Controller
{
    public function index()
    {
        // Tetapkan kapasitas ruang baca
        $capacity = 30;

        // Hitung jumlah pengguna yang belum memiliki exit_time (masih berada di ruang baca)
        $occupied = ActiveUser::whereNull('exit_time')->count();

        return view('mhs.index', compact('capacity', 'occupied'));
    }
}
