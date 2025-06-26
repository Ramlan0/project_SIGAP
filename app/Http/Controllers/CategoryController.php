<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Category::All();
       return view('petugas.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('petugas.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama_kategori' => 'required|max:255',

        ], [
            'nama_kategori.required' => 'kategori wajib diisi.',
            
        ]);
        Category::create($request->all());
        // manggail field biar gaharus satu satu 
        

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Category::FindorFail($id);
        return view('petugas.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori' => 'required|max:255,'
        ],[
            'nama_kategori.required'=>'Kategri wajib diisi.',
        ]);
        Category::create($request->all());
        return redirect()->route('kategori.index')->with('success','Kategori berhasil di tambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kategori = Category::findOrfail($id); 
        $kategori->delete();
        return redirect()->route('kategori.index')-> with('success','Kategori berhasil di hapus.');
    }
}
