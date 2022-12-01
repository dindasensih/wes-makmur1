<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Post;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Post::all();
        return view('post.view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Post::all();
        $kategori = Kategori::all();
        $user = User::all();
        return view('post.create', compact('data', 'kategori', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        Post::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'tanggal' => $request->tanggal,
            'user_id' => $user,
            'kategori_id' => $request->kategori_id,

        ]);
         
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Post ::findOrFail($id);
        $kategori = Kategori::all();
        return view('post.edit', compact('data', 'kategori'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Post::find($id);
        $validator = $request->validate([
            'judul' => 'required|string',
            'isi' => 'required',
            'tanggal' => 'required|string',
            'user_id' => 'required',
            'kategori_id' => 'required',

        ]);
        $data->update($validator);
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::findOrfail($id);
        $data->delete();
        return redirect('post');
    }

    public function dashboard()
    {
        $data = Post::all();
        return view('dashboard', compact('data'));
    }

    public function detail($id)
    {
        $data = Post::findOrFail($id);
        $produk = Produk::where('kategori_id', $data->kategori_id)->get();
        return view('detail', compact('data', 'produk'));
    }
}
