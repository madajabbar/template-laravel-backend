<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\background;
use App\Models\Periode;
use App\Models\Struktur;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = Periode::latest()->take(1)->value('id');
        // dd($periode);
        $data['struktur'] = Struktur::orderBy('id', 'Asc')->where('periode_id', $periode)->get();
        $data['background'] = background::latest()->take(1)->get();
        return view('frontend.profil.index',$data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['menteri'] = Anggota::where('struktur_id', $id)->where('jabatan','like','%menteri%')->get();
        $data['anggota'] = Anggota::where('struktur_id', $id)->where('jabatan','not like','%menteri%')->get();
        // dd($data['anggota']);
        $data['background'] = background::latest()->take(1)->get();
        return view('frontend.profil.struktur.index', $data);
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
