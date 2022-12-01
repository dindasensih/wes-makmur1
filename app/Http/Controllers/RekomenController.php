<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('rekomen');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $a = new saran($request->keluhan, $request->tahun);
        $data = [
            'nama_jamu' => $a->namajamu(),
            'khasiat' => $a->khasiat(),
            'keluhan' => $request->keluhan,
            'umur' => $a->hitungUmur(),
            'saran_guna' => $a->rekom1(),
            'saran_konsum' => $a->rekom2()
        ];
        return view('rekomen', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

class Jamu{
    public function __construct($keluhan, $tahun)
    {
        $this->keluhan=$keluhan;
        $this->tahun=$tahun;
    }
    public function namajamu()
    {
        if ($this->keluhan == 'keseleo') {
            return "Beras Kencur";
        }else if ($this->keluhan == 'kurang nafsu makan') {
            return "Beras Kencur";
        }else if ($this->keluhan == 'pegal-pegal') {
            return "Kunyit Asam";
        }else if ($this->keluhan == 'darah tinggi') {
            return "Brotowali";
        }else if ($this->keluhan == 'gula darah') {
            return "Brotowali";
        }else if ($this->keluhan == 'kram perut') {
            return "Temulawak";
        }else if ($this->keluhan == 'masuk angin') {
            return "Temulawak";
        }else{
            return "Tidak Terdaftar";
        }
    }
    public function hitungUmur()
    {
        return 2022 - $this->tahun;
    }
    public function khasiat()
    {
        if ($this->namajamu() == 'Beras Kencur') {
            return "Dapat mengobati keseleo dan memperbaiki nafsu makan";
        }else if ($this->namajamu() == 'Kunyit Asam') {
            return "Dapat mengobati pegal-pegal";
        }else if ($this->namajamu() == 'Brotowali') {
            return "Dapat menurunkan penyakit Darah Tinggi dan Gula Darah";
        }else if ($this->namajamu() == 'Temulawak') {
            return "Dapat mengobati kram perut dan masuk angin";
        }else{
            return "Tidak Terdaftar";
        }
    }
}

class saran extends Jamu{
    public function rekom1()
    {
        if ($this->hitungUmur() <=10 ){
            return "Dikonsumsi 1x";
        }else{
            return "Dikonsumsi 2x";
        }
    }
    public function rekom2()
    {
        if ($this->keluhan == "keseleo" ){
            return "Dioleskan";
        }else{
            return "Dikonsumsi";
        }
    }
}