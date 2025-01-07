<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\SearchHistory;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\ResepExport;

class ResepController extends Controller
{

     // Form Upload Resep
    public function create()
    {
        return view('reseps.create');
    }

    // Simpan Resep
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'descriptions' => 'required|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'cooking_time' => 'required|integer',
            'portion' => 'required|integer',
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category' => 'required|in:makanan,minuman',
        ]);

        $imagePath = $request->file('image_path')->store('images', 'public');

        Resep::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'descriptions' => $request->descriptions,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
            'cooking_time' => $request->cooking_time,
            'portion' => $request->portion,
            'image_path' => $imagePath,
            'category' => $request->category,
        ]);

        return redirect()->route('dashboard')->with('success', 'Resep berhasil diunggah!');
    }

    // Form Edit Resep
    public function edit($id)
    {
        $resep = Resep::where('user_id', Auth::id())->findOrFail($id);
        return view('reseps.edit', compact('resep'));
    }

    // Update Resep
    public function update(Request $request, $id)
    {
        $resep = Resep::where('user_id', Auth::id())->findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'descriptions' => 'required|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'cooking_time' => 'required|integer',
            'portion' => 'required|integer',
            'image_path' => 'nullable|image|mimes:webp,jpeg,png,jpg,gif|max:2048',
            'category' => 'required|in:makanan,minuman',
        ]);

        $imagePath = $resep->image_path;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('images', 'public');
        }

        $resep->update([
            'title' => $request->title,
            'descriptions' => $request->descriptions,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
            'cooking_time' => $request->cooking_time,
            'portion' => $request->portion,
            'image_path' => $imagePath,
            'category' => $request->category,
        ]);

        return redirect()->route('dashboard')->with('success', 'Resep berhasil diperbarui!');
    }

    // Hapus Resep
    public function destroy($id)
    {
        $resep = Resep::where('user_id', Auth::id())->findOrFail($id);
        $resep->delete();

        return redirect()->route('dashboard')->with('success', 'Resep berhasil dihapus!');
    }

public function show($id)
{
    // Ambil data resep berdasarkan ID
    $resep = Resep::findOrFail($id);

    // Tambahkan tampilan ke tabel views
    // Pastikan hanya menambahkan tampilan jika user belum melihat resep ini
    if (!View::where('user_id', Auth::id())->where('resep_id', $resep->id)->exists()) {
        View::create([
            'user_id' => Auth::id(),
            'resep_id' => $resep->id,
        ]);
    }

    // Menghitung jumlah tampilan untuk resep ini
    $totalViews = View::where('resep_id', $resep->id)->count();

    // Menyimpan riwayat pencarian setelah mengklik resep
    $lastSearchHistory = SearchHistory::where('user_id', Auth::id())
                                      ->whereNull('resep_id') // Hanya yang belum memiliki resep_id
                                      ->latest()
                                      ->first();

    // Jika ada riwayat pencarian sebelumnya dan tidak ada resep_id, simpan resep_id
    if ($lastSearchHistory) {
        $lastSearchHistory->update([
            'resep_id' => $resep->id,
        ]);
    }

    // Menampilkan detail resep
    return view('reseps.detailresep', [
        'resep' => $resep,
        'totalViews' => $totalViews, // Mengirimkan jumlah tampilan ke view
    ]);
}




        public function storeComment(Request $request, $id)
    {
        $resep = Resep::findOrFail($id);

        if (Auth::check()) {
            $request->validate([
                'comment' => 'required|string|max:1000',
            ]);

            DB::table('comments')->insert([
                'user_id' => Auth::id(),
                'resep_id' => $resep->id,
                'comment' => $request->comment,
                'created_at' => now(),
                'updated_at' => now()
            ]);

            return back()->with('status', 'Komentar berhasil ditambahkan.');
        }

        return redirect()->route('login')->with('error', 'Silakan login untuk memberikan komentar.');
    }


        public function destroyComment($id)
    {
        $comment = DB::table('comments')->where('id', $id)->first();

        if (!$comment) {
            return response()->json(['success' => false, 'message' => 'Komentar tidak ditemukan.']);
        }

        if (Auth::id() !== $comment->user_id) {
            return response()->json(['success' => false, 'message' => 'Anda tidak memiliki izin untuk menghapus komentar ini.']);
        }

        DB::table('comments')->where('id', $id)->delete();

        return response()->json(['success' => true, 'message' => 'Komentar berhasil dihapus.']);
    }

        public function toggleLike($id)
{
    $userId = Auth::id(); // Mendapatkan ID pengguna yang sedang login
    $resep = Resep::findOrFail($id);

    // Cek apakah pengguna sudah menyukai resep ini
    $like = $resep->likes()->where('user_id', $userId)->first();

    if ($like) {
        // Jika sudah di-like, hapus like
        $like->delete();
        $liked = false;
    } else {
        // Jika belum di-like, tambahkan like
        $resep->likes()->create(['user_id' => $userId]);
        $liked = true;
    }

    // Mengembalikan data yang dibutuhkan untuk update tampilan
    return response()->json([
        'liked' => $liked,
        'likeCount' => $resep->likes()->count(),
    ]);
}
public function downloadPDF($id)
{
    // Ambil data resep berdasarkan ID
    $resep = Resep::findOrFail($id);

    // Kirim data ke view khusus PDF
    $pdf = PDF::loadView('pdf.resep', compact('resep'));

    // Unduh file PDF
    return $pdf->download($resep->title . '.pdf');
}

public function exportResep()
{
    // Cek apakah pengguna adalah admin (ID 1)
    if (auth()->user()->id !== 1) {
        return redirect()->route('home')->with('error', 'You are not authorized to perform this action.');
    }

    // Jika admin, lakukan export
    return Excel::download(new ResepExport, 'resep.xlsx');
}
}