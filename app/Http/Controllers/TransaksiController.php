<?php

namespace App\Http\Controllers;
use App\Models\Transaksi;
use App\Models\mobil;
use Auth;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::all();

        return response()->json([
            "message" => "DAFTAR TRANSAKSI USER",
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

        $user_id = Auth::id();
        $user_name = Auth::user()->email;
        $user_name = Auth::user()->name;
        $user_alamat = Auth::user()->alamat;
        $user_nik = Auth::user()->nik;
        $user_nohp = Auth::user()->no_hp;

        $id_mobil = $request->id_mobil;
        $nama_mobil = mobil::Where('id', $id_mobil)->value('nama_mobil');
        $nopol_mobil = mobil::Where('id', $id_mobil)->value('nopol_mobil');
        $harga_sewa_mobil = mobil::Where('id', $id_mobil)->value('harga_sewa_mobil');

        $data = Transaksi::create([
            "email" => $user_id,
            "nama" => $user_name,
            "alamat" => $user_alamat,
            "no_hp" => $user_nohp,
            "nik" => $user_nik,
            "lok_antar" => $request->lok_antar,
            "jam_antar" => $request->jam_antar,
            "lok_balik" => $request->lok_balik,
            "jam_balik" => $request->jam_balik,
            "id_mobil" => $id_mobil,
            "nama_mobil" => $nama_mobil,
            "nopol_mobil" => $nopol_mobil,
            "harga_sewa_mobil" => $harga_sewa_mobil,
        ]);
        return response()->json([
            "message" => "Data Berhasil Di Inputkan Silakan Tunggu Pesan Dari User",
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
        $data = Transaksi::find($id);
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
        $data = Transaksi::find($id);
        if($data){
            $data->lok_antar = $request->lok_antar ? $request->lok_antar : $data->lok_antar;
            $data->jam_antar = $request->jam_antar ? $request->jam_antar : $data->jam_antar;
            $data->lok_balik = $request->lok_balik ? $request->lok_balik : $data->lok_balik;
            $data->jam_balik = $request->jam_balik ? $request->jam_balik : $data->jam_balik;
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
        $data = Transaksi::find($id);
        if($data){
            $data->delete();
            return ["message" => "Data Berhasil Di Hapus"];
        }else{
            return ["message" => "Data Tidak Ditemukan"];
        }
    }
}
