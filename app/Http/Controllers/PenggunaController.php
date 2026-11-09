<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class PenggunaController extends Controller
{
    // Menampilkan semua pengguna
    public function index()
    {
        $pengguna = Pengguna::latest()->get();

        return view('pengguna.index', compact('pengguna'));
    }

    // Menampilkan form tambah pengguna
    public function create()
    {
        return view('pengguna.create');
    }

    // Menyimpan pengguna baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|string|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);

        Pengguna::create($data);

        return redirect()->route('pengguna.index')
            ->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Menampilkan form edit pengguna
    public function edit(Pengguna $pengguna)
    {
        return view('pengguna.edit', compact('pengguna'));
    }

    // Memperbarui data pengguna
    public function update(Request $request, Pengguna $pengguna)
    {
        $data = $request->validate([
            'nama_pengguna' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('pengguna', 'email')
                    ->ignore($pengguna->id),
            ],
            'password' => 'nullable|string|min:8',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $pengguna->update($data);

        return redirect()->route('pengguna.index')
            ->with('success', 'Pengguna berhasil diperbarui.');
    }

    // Menghapus pengguna
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();

        return redirect()->route('pengguna.index')
            ->with('success', 'Pengguna berhasil dihapus.');
    }
}
