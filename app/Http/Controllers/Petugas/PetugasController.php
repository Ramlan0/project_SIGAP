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
 
    public function index()
    {
        return view('petugas.dashboard');
    }
}
