<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class LaporController extends Controller
{
    public function userReports()
{
    $laporans = Report::with('response') // jika pakai relasi response
        ->where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('warga.lapor.saya', compact('laporans'));
}
}
