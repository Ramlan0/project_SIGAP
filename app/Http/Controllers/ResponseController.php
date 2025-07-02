<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResponseController extends Controller
{
     public function create($report_id)
    {
        $report = Report::findOrFail($report_id);
        return view('petugas.respon.create', compact('report'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'report_id' => 'required|exists:reports,id',
            'tanggapan' => 'required',
            'status' => 'required|in:Pending,Diproses,Selesai'
        ]);

        Response::create([
            'report_id' => $request->report_id,
            'user_id' => Auth::id(),
            'tanggapan' => $request->tanggapan,
        ]);

        // Update status laporan
        $report = Report::find($request->report_id);
        $report->update(['status' => $request->status]);

        return redirect()->route('petugas.dashboard')->with('success', 'Tanggapan berhasil disimpan dan status diperbarui.');
    }   

    public function edit($id)
    {
        $response = Response::findOrFail($id);
        $report = $response->report; // relasi ke Report, pastikan ada relasi di model

        return view('petugas.respon.edit', compact('response', 'report'));
    }
        
    

            public function update(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required',
            'status' => 'required|in:Pending,Diproses,Selesai',
        ]);

        // Ambil data tanggapan berdasarkan ID
        $response = Response::findOrFail($id);

        // Update tanggapan
        $response->update([
            'tanggapan' => $request->tanggapan,
        ]);

        // Update status laporan terkait
        $report = $response->report; // menggunakan relasi
        $report->update(['status' => $request->status]);

        return redirect()->route('petugas.dashboard')->with('success', 'Tanggapan dan status berhasil diperbarui.');
    }

}

