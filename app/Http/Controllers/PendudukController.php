<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduk = Penduduk::orderBy('created_at', 'DESC')->get();
        return view('penduduk.index', compact('penduduk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penduduk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'nik' => 'required|unique:penduduks,nik|digits:16',
            'no_kk' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
        ]);

        // Jika validasi sukses, simpan data
        Penduduk::create($validated);

        return redirect()->route('admin.penduduk')->with([
            'success' => 'Penduduk added successfully',
            'success_type' => 'upload',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('penduduk.show', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        return view('penduduk.edit', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'nik' => 'required|unique:penduduks,nik,' . $id . '|digits:16',
            'no_kk' => 'required|string|max:16',
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
        ]);

        // Lakukan update data
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->update($validated);

        // Redirect ke halaman penduduk dengan pesan sukses
        return redirect()->route('admin.penduduk')->with([
            'success' => 'Penduduk updated successfully',
            'success_type' => 'update',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penduduk = Penduduk::findOrFail($id);
        $penduduk->delete();

        return redirect()->route('admin.penduduk')->with([
            'success' => 'Penduduk deleted successfully',
            'success_type' => 'delete',
        ]);
    }
}
