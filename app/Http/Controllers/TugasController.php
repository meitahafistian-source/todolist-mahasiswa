<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::with('mataKuliah')
            ->where('pengguna_id', Auth::id())
            ->latest()
            ->get();

        $mataKuliah = MataKuliah::orderBy('nama_matkul')->get();

        return view('tugas.index', compact(
            'tugas',
            'mataKuliah'
        ));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'mata_kuliah_id' => 'required|exists:mata_kuliah,id',
            'deskripsi' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|in:belum,selesai',
        ]);

        $data['pengguna_id'] = Auth::id();

        Tugas::create($data);

        return redirect()->route('tugas.index')
            ->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function updateStatus(Request $request, int $id)
    {
        $tugas = Tugas::where('pengguna_id', Auth::id())
            ->findOrFail($id);

        $tugas->status = $tugas->status === 'belum'
            ? 'selesai'
            : 'belum';

        $tugas->save();

        return redirect()->route('tugas.index')
            ->with('success', 'Status tugas berhasil diperbarui!');
    }

    public function destroy(int $id)
    {
        $tugas = Tugas::where('pengguna_id', Auth::id())
            ->findOrFail($id);

        $tugas->delete();

        return redirect()->route('tugas.index')
            ->with('success', 'Tugas berhasil dihapus!');
    }
}
