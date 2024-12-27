<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;
use App\Models\Surat;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function adminHome()
    {
        $totalPenduduk = Penduduk::count();
        $suratMenunggu = Surat::where('status', 'menunggu')->count();
        $suratDiproses = Surat::where('status', 'selesai')->count();
        $suratDitolak = Surat::where('status', 'Ditolak')->count();

        return view('dashboard', compact('totalPenduduk', 'suratMenunggu', 'suratDiproses', 'suratDitolak'));
    }
}
