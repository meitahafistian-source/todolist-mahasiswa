<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliah = MataKuliah::latest()->get();

        return view('mata_kuliah.index', compact('mataKuliah'));
    }

    public function create()
    {
        return view('mata_kuliah.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_matkul' => 'required|string|max:255',
            'dosen' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        MataKuliah::create($data);

        return redirect()->route('mata_kuliah.index')
            ->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function edit(MataKuliah $mata_kuliah)
    {
        return view('mata_kuliah.edit', [
            'mataKuliah' => $mata_kuliah,
        ]);
    }

    public function update(Request $request, MataKuliah $mata_kuliah)
    {
        $data = $request->validate([
            'nama_matkul' => 'required|string|max:255',
            'dosen' => 'required|string|max:255',
            'semester' => 'required|integer|min:1|max:8',
        ]);

        $mata_kuliah->update($data);

        return redirect()->route('mata_kuliah.index')
            ->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function destroy(MataKuliah $mata_kuliah)
    {
        $mata_kuliah->delete();

        return redirect()->route('mata_kuliah.index')
            ->with('success', 'Mata kuliah berhasil dihapus.');
    }
}
