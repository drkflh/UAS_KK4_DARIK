<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\mobil;


class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = mobil::all();

        return response()->json([
            "message" => "Load Data Berhasil",
            "data" => $data
        ], 200);
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
        $this->validate($request, [
            'foto_mobil'     => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $foto_mobil = $request->file('foto_mobil');
        $foto_mobil->storeAs('public/images', $foto_mobil->hashName());

        $data = mobil::create([
            "nama_mobil" => $request->nama_mobil,
            "nopol_mobil" => $request->nopol_mobil,
            "jenis_mobil" => $request->jenis_mobil,
            "desk_mobil" => $request->desk_mobil,
            "tahun_mobil" => $request->tahun_mobil,
            "status_mobil" => $request->status_mobil,
            "harga_sewa_mobil" => $request->harga_sewa_mobil,
            "foto_mobil" => $foto_mobil->hashName()
        ]);
        return response()->json([
            "message" => "Data Berhasil Di Tambah",
            "data" => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = mobil::find($id);
        if($data){
            return $data;
        }else{
            return ["message" => "Data Tidak Ditemukan"];
        }
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
        $data = mobil::find($id);
        if($data){
            $data->nama_mobil = $request->nama_mobil ? $request->nama_mobil : $data->nama_mobil;
            $data->nopol_mobil = $request->nopol_mobil ? $request->nopol_mobil : $data->nopol_mobil;
            $data->jenis_mobil = $request->jenis_mobil ? $request->jenis_mobil : $data->jenis_mobil;
            $data->desk_mobil = $request->desk_mobil ? $request->desk_mobil : $data->desk_mobil;
            $data->tahun_mobil = $request->tahun_mobil ? $request->tahun_mobil: $data->tahun_mobil;
            $data->status_mobil = $request->status_mobil ? $request->status_mobil : $data->status_mobil;
            $data->harga_sewa_mobil = $request->harga_sewa_mobil ? $request->harga_sewa_mobil : $data->harga_sewa_mobil;
            $data->save();

            return $data;
        }else{
            return ["message" => "Data  Tidak  Ditemukan"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = mobil::find($id);
        if($data){
            $data->delete();
            return ["message" => "Data Berhasil Di Hapus"];
        }else{
            return ["message" => "Data Tidak Ditemukan"];
        }
    }
}