<?php

namespace App\Http\Controllers;

use App\Pupuk;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        return view("transaksi.index", compact("transaksi"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pupuk = Pupuk::all();
        return view("transaksi.create", compact("pupuk"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            "kode" => "required",
            "pupuk" => "required",
            "jumlah" => "required",
            "tanggal" => "required",
            "kode_kb" => "required",
        ], [
            "kode.required" => "kode tidak boleh kosong",
            "pupuk.required" => "pupuk tidak boleh kosong",
            "jumlah.required" => "jumlah tidak boleh kosong",
            "tanggal.required" => "tanggal tidak boleh kosong",
            "kode_kb.required" => "kode kb tidak boleh kosong",
        ]);

        if (!$validation->fails()) {
            $transaksi = new Transaksi;
            $transaksi->kode = $request->kode;
            $transaksi->pupuk_id = $request->pupuk;
            $transaksi->jumlah = $request->jumlah;
            $transaksi->tanggal = $request->tanggal;
            $transaksi->kode_kb = $request->kode_kb;
            $transaksi->save();
        } else {
            return redirect()
                ->back()
                ->withErrors($validation)
                ->withInput()
                ->withToastError('Gagal memproses transaksi!');
        }

        return redirect()->route('transaksi.index')->withToastSuccess('Berhasil memproses transaksi!');
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
        $transaksi = Transaksi::find($id);
        $pupuk = Pupuk::all();
        return view("transaksi.edit", compact("pupuk", "transaksi"));
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
        $validation = Validator::make($request->all(), [
            "kode" => "required",
            "pupuk" => "required",
            "jumlah" => "required",
            "tanggal" => "required",
            "kode_kb" => "required",
        ], [
            "kode.required" => "kode tidak boleh kosong",
            "pupuk.required" => "pupuk tidak boleh kosong",
            "jumlah.required" => "jumlah tidak boleh kosong",
            "tanggal.required" => "tanggal tidak boleh kosong",
            "kode_kb.required" => "kode kb tidak boleh kosong",
        ]);

        if (!$validation->fails()) {
            $transaksi = Transaksi::find($id);
            $transaksi->kode = $request->kode;
            $transaksi->pupuk_id = $request->pupuk;
            $transaksi->jumlah = $request->jumlah;
            $transaksi->tanggal = $request->tanggal;
            $transaksi->kode_kb = $request->kode_kb;
            $transaksi->save();
        } else {
            return redirect()
                ->back()
                ->withErrors($validation)
                ->withInput()
                ->withToastError('Gagal memproses transaksi!');
        }

        return redirect()->route('transaksi.index')->withToastSuccess('Berhasil memproses transaksi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();

        return redirect()->route('transaksi.index')->withToastSuccess('Berhasil menghapus transaksi!');
    }
}
