<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminSuratController extends Controller
{
    // Menampilkan daftar surat dengan status 'menunggu'
    public function index()
    {
        $surats = Surat::whereIn('status', ['menunggu', 'selesai', 'ditolak'])->get();
        return view('surat.admin.index', compact('surats'));
    }

    // Menampilkan detail surat untuk verifikasi
    public function show($id)
    {
        $surat = Surat::findOrFail($id);
        return view('surat.admin.show', compact('surat'));
    }

    public function process(Request $request, $id)
    {
    $request->validate([
        'file_surat' => 'required|mimes:pdf,doc,docx|max:2048',
    ]);
    
    $surat = Surat::findOrFail($id);

    if ($request->hasFile('file_surat')) {
        $file = $request->file('file_surat');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads.surat', $fileName, 'public');
        $surat->update([
            'status' => 'selesai',
            'file_admin_path' => $filePath,
        ]);
    }

    // Redirect ke halaman detail surat
    return redirect()->route('admin.surat.show', $id)
                 ->with('success', 'Surat berhasil diproses dan selesai.')
                 ->with('status', 'selesai');
    }

    public function reject(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);
        $request->validate([
            'alasan_penolakan' => 'required|string|max:255',
        ]);

        // Update status dan alasan penolakan
        $surat->update([
            'status' => 'ditolak',
            'alasan_penolakan' => $request->alasan_penolakan,
        ]);

        // Redirect ke halaman detail surat
        return redirect()->route('admin.surat.show', $id)
                    ->with('success', 'Surat telah ditolak.')
                    ->with('status', 'ditolak'); 
    }
}
