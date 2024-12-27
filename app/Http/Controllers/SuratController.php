<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuratController extends Controller
{
    /**
     * Menampilkan form pengajuan surat.
     */
    public function create()
    {
        return view('surat.create');
    }

    /**
     * Menyimpan permohonan surat.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|digits:16',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'jenis_surat' => 'required|string',
            'keperluan' => 'required|string',
            'dokumen' => 'required|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $filePath = $request->file('dokumen')->store('dokumen_surat', 'public');

        Surat::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'jenis_surat' => $request->jenis_surat,
            'keperluan' => $request->keperluan,
            'dokumen_path' => $filePath, // Simpan path file
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('surat.index')->with('success', 'Surat berhasil diajukan.');
    }

    /**
     * Menampilkan daftar surat yang diajukan oleh user.
     */
    public function index()
    {
        // Ambil surat yang hanya diajukan oleh user yang sedang login
        $surats = Surat::where('user_id', Auth::id())->get();

        return view('surat.index', compact('surats'));
    }
}
