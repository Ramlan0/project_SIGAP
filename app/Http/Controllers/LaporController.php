<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporController extends Controller
{   
    //     public function index()
    // {
    //     // Tampilkan semua laporan user (atau yang sesuai dengan kebutuhan)
    //     $laporans = Report::where('user_id', Auth::id())->latest()->get();
    //     return view('warga.lapor.index', compact('laporans'));
    // }
        public function create()
    {
        $categories = Category::all();
        return view('warga.lapor.create', compact('categories'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'judul' => 'required|string|max:255',
    //         'deskripsi' => 'required|string',
    //         'category_id' => 'required|exists:categories,id',   
    //         'tanggal_laporan' => 'nullable|date',
    //     ]); 
    //      if (Auth::user()->role === 'admin') {
    //         $data['tanggal_laporan'] = $request->tanggal_laporan;
    //     }

    //     Report::create([
    //         'user_id' => Auth::id(),
    //         'category_id' => $request->category_id,
    //         'judul' => $request->judul,
    //         'deskripsi' => $request->deskripsi,
    //         'status' => 'Pending',
    //     ]);

    //     return redirect('/warga')->with('success', 'Laporan berhasil dikirim.');
    // }    

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',   
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string',  

        ]);
    
        $data = [
            'user_id' => Auth::id(),
            'category_id' => $request->category_id, 
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi, 
            'alamat' => $request->alamat,   
            'tanggal_laporan' => now(),
            'status' => 'Pending',
        ];
    
        if (Auth::user()->role === 'admin' && $request->filled('tanggal_laporan')) {
            $data['tanggal_laporan'] = $request->tanggal_laporan; // override jika admin
        }
    
        Report::create($data);
    
        return redirect()->route('lapor.saya')->with('success', 'Laporan berhasil dikirim!');
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