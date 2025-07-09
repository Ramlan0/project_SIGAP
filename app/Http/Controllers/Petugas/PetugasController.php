<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
     public function __construct()
    {
        $this->middleware('petugas');
    }
 
    // public function index()
    // {
    //     return view('petugas.dashboard');
    // }    

    public function index()
{
    $totalUsers = \App\Models\User::count();
    $pendingReports = \App\Models\Report::where('status', 'Pending')->count();
    $respondedReports = \App\Models\Report::whereIn('status', ['Diproses', 'Selesai'])->count();

    return view('petugas.dashboard', compact('totalUsers', 'pendingReports', 'respondedReports'));
}
}
