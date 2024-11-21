<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class ManageMahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(10);
        return view('adm.data_mahasiswa', compact('mahasiswas'));
    }

    public function create()
    {
        return view('crud.mahasiswa_create');
    }

    public function store(Request $request)
    {
        // Validasi input (sama seperti sebelumnya)

        // Tambahkan peran 'mahasiswa' secara otomatis
        $data = $request->all();
        $data['role'] = 'mahasiswa';

        Mahasiswa::create($data);

        return redirect()->route('adm-mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('crud.mahasiswa_view', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('crud.mahasiswa_edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input (sama seperti sebelumnya)

        // Memperbarui data mahasiswa
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Pastikan peran tetap 'mahasiswa'
        $data = $request->all();
        $data['role'] = 'mahasiswa';

        $mahasiswa->update($data);

        return redirect()->route('adm-mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('adm-mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
