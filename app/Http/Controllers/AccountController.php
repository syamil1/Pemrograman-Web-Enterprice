<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Resep;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    // Menampilkan halaman akun pengguna
    public function index()
    {
        $user = Auth::user(); // Pengguna yang sedang login
        $reseps = $user->reseps; // Mengambil resep yang diunggah oleh pengguna
    
        return view('account.index', compact('user', 'reseps'));
    }
}
