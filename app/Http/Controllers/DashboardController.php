<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Tugas;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalTugas = Tugas::where('pengguna_id', $userId)->count();

        $tugasBelum = Tugas::where('pengguna_id', $userId)
            ->where('status', 'belum')
            ->count();

        $tugasSelesai = Tugas::where('pengguna_id', $userId)
            ->where('status', 'selesai')
            ->count();

        $tugasTerbaru = Tugas::with('mataKuliah')
            ->where('pengguna_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalTugas',
            'tugasBelum',
            'tugasSelesai',
            'tugasTerbaru'
        ));
    }
}