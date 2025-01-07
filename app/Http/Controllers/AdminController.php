<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resep;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    // Menampilkan semua pengguna
    public function viewUsers()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Menampilkan semua resep
    public function viewRecipes()
    {
        $recipes = Resep::with('user')->get();
        return view('admin.recipes.index', compact('recipes'));
    }    

    // Mengunduh data user sebagai PDF
    public function downloadUsers()
    {
        $users = User::all();
        $pdf = PDF::loadView('admin.users-pdf', compact('users'));
        return $pdf->download('users.pdf');
    }

    // Mengunduh data resep sebagai PDF
    public function downloadRecipes()
    {
        $recipes = Resep::all(); // Ganti Recipe::all() menjadi Resep::all()
        $pdf = PDF::loadView('admin.recipes-pdf', compact('recipes'));
        return $pdf->download('recipes.pdf');
    }

    // Menghapus resep
    public function deleteRecipe($id)
    {
        $recipe = Resep::findOrFail($id); // Ganti Recipe::findOrFail() menjadi Resep::findOrFail()
        $recipe->delete();
        return redirect()->route('admin.recipes.index')->with('success', 'Resep berhasil dihapus.');
    }
}

