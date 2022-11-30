<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Produk::all();
        return view('produk.view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Produk::all();
        $kategori = Kategori::all();
        return view('produk.create', compact('data', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('foto')->store('storage/foto');
        Produk::create([
            'nama' => $request->nama,
            'foto' => $file,
            'harga' => $request->harga,
            'descpro' => $request->descpro,
            'kategori_id' => $request->kategori_id,

        ]);
         
        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Produk ::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk.edit', compact('data', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Produk::find($id);
        if ($request->file('foto')) {
            $file = $request->file('foto')->store('img');
            $data->update([
                'nama' => $request->nama,
                'foto' => $file,
                'harga' => $request->harga,
                'descpro' => $request->descpro,
                'kategori_id' => $request->kategori_id,
            ]);
        }else {
            $data->update([
                'nama' => $request->nama,
                'foto' => $data->foto,
                'harga' => $request->harga,
                'descpro' => $request->descpro,
                'kategori_id' => $request->kategori_id,
            ]);
        }
        return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Produk::findOrfail($id);
        $data->delete();
        return redirect('produk');
    }
}
