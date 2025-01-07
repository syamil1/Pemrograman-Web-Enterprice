<?php

namespace App\Http\Controllers;

use App\Models\Bookmark;
use App\Models\Resep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CollectionController extends Controller
{
    // Menampilkan koleksi resep yang disimpan oleh user
    public function index()
    {
        $bookmarks = Bookmark::where('user_id', Auth::id())->with('resep')->get();

        return view('collection.index', compact('bookmarks'));
    }

    // Menyimpan resep ke dalam koleksi (bookmarks)
    public function store($id)
    {
        $user = Auth::user();
        $resep = Resep::findOrFail($id);

        // Cek apakah resep sudah disimpan dalam koleksi
        if ($user->bookmarks()->where('resep_id', $resep->id)->exists()) {
            return redirect()->back()->with('error', 'Resep sudah ada di koleksi Anda.');
        }

        // Simpan resep ke koleksi
        Bookmark::create([
            'user_id' => $user->id,
            'resep_id' => $resep->id,
        ]);
 
        return redirect()->back()->with('success', 'Resep berhasil disimpan ke koleksi.');
    }

    // Menghapus resep dari koleksi
    public function destroy($id)
    {
        $user = Auth::user();
        $bookmark = Bookmark::where('user_id', $user->id)->where('resep_id', $id)->first();

        if ($bookmark) {
            $bookmark->delete();
            return redirect()->back()->with('success', 'Resep berhasil dihapus dari koleksi.');
        }

        return redirect()->back()->with('error', 'Resep tidak ditemukan di koleksi Anda.');
    }
}
