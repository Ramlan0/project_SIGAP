<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('warga.lapor.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Report::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'status' => 'Pending',
        ]);

        return redirect('/warga')->with('success', 'Laporan berhasil dikirim.');
    }
    public function userReports()
{
    $laporans = Report::with('response') // jika pakai relasi response
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('warga.lapor.saya', compact('laporans'));
}
}