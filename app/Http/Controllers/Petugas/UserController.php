<?php

namespace App\Http\Controllers\Petugas;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function __construct()
    {
        $this->middleware('petugas');
    }
 
    public function index()
    {
        $users = User::with('role')->paginate(10);
        return view('users.index', compact('users'));
    }
 
    public function show(User $user)
    {
        return view('petugas.users.show', compact('user'));
    }
 
    public function destroy(User $user)
    {
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Tidak dapat menghapus akun sendiri');
        }
 
        $user->delete();
        return redirect()->route('petugas.users.index')->with('success', 'User berhasil dihapus');
    }
}
