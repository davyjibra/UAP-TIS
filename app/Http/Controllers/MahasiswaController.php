<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();

        return response()->json([
            'status' => 'success',
            'data' => $mahasiswas
        ]);
    }
}