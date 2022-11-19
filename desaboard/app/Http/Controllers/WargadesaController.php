<?php

namespace App\Http\Controllers;

use App\Models\wargadesa;
use App\Models\dusun;
use Illuminate\Http\Request;
use App\Http\Requests\StorewargadesaRequest;
use App\Http\Requests\UpdatewargadesaRequest;
use Illuminate\Support\Facades\DB;

class WargadesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
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
     * @param  \App\Http\Requests\StorewargadesaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validateData = $request->validate([
            'NIK' => 'required | max:16 | unique:wargadesas',
            'Nama' => 'required | max:64',
            'Nomor_KK' => 'required | max:16',
            'Jenis_Kelamin' => 'required | max:32',
            'Status_Perkawinan'=> 'required | max:32',
            'Tanggal_Lahir' => 'required | date',
            'Pekerjaan' => 'required | max:64',
            'Status_Dalam_Keluarga' => 'required | max:64',
            'Nomor_Telepon' => 'required | max:16',
            'dusun_id' => 'required | int'
        ]);
        wargadesa::create($validateData);
        return redirect('/data')-> with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wargadesa  $wargadesa
     * @return \Illuminate\Http\Response
     */
    public function show(wargadesa $wargadesa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wargadesa  $wargadesa
     * @return \Illuminate\Http\Response
     */
    public function edit(wargadesa $wargadesa)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatewargadesaRequest  $request
     * @param  \App\Models\wargadesa  $wargadesa
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, wargadesa $wargadesa)
    {
        
        $validateData = $request->validate([
            'NIK' => 'required | max:16',
            'Nama' => 'required | max:64',
            'Nomor_KK' => 'required | max:16',
            'Jenis_Kelamin' => 'required | max:32',
            'Status_Perkawinan'=> 'required | max:32',
            'Tanggal_Lahir' => 'required | date',
            'Pekerjaan' => 'required | max:64',
            'Status_Dalam_Keluarga' => 'required | max:64',
            'Nomor_Telepon' => 'required | max:16',
            'dusun_id' => 'required|int '
        ]);
        $wargadesa = wargadesa::where('WargaID', '=', $id)->update($validateData) ;
        return redirect('/data')->with('success', 'Data Berhasil Diubah');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wargadesa  $wargadesa
     * @return \Illuminate\Http\Response
     */
    public function destroy($wargadesa)
    {
        $data = wargadesa::where('WargaID', '=', $wargadesa)->delete();
        return redirect('/data')->with('success', 'Data Berhasil Dihapus');
    }

    public function getkelahiran()
    {
        return view('charts/kelahiran', [
            "wargadesa" => \App\Models\wargadesa::all(),
            'title' => 'Desaboard | Kelahiran'
            ]);
    }

    public function getJK()
    {
        return view('charts/jenis-kelamin', [
            "wargadesa" => \App\Models\wargadesa::all(),
            'title' => 'Desaboard | Jenis Kelamin'
            ]);
    }

    public function getpekerjaan()
    {
        return view('charts/pekerjaan', [
            "wargadesa" => \App\Models\wargadesa::all(),
            'title' => 'Desaboard | Pekerjaan'
            ]);
    }

    public function getpendidikan()
    {
        return view('charts/pendidikan', [
            "wargadesa" => \App\Models\wargadesa::all(),
            'title' => 'Desaboard | Pendidikan'
            ]);
    }

    public function getusia()
    {
        return view('charts/usia', [
            "wargadesa" => \App\Models\wargadesa::all(),
            'title' => 'Desaboard | Sebaran Usia'
            ]);
    }

    public function getdata()
    {   
        if(request('search')){

            $cari = wargadesa::where('Nama', 'like', '%' . request('search') . '%')
                ->orwhere('NIK', 'like', '%' . request('search') ."%")
                ->orwhere('Nomor_KK', 'like', '%' . request('search')  ."%")->paginate(10)->withQueryString();
            if(count($cari)>0){
                return view('data/data', [
                    "wargadesa" => $cari,
                    "dusuns" => dusun::all(),
                    "checker" => 2,
                    'title' => 'Desaboard | Cari Data'
                    ]);
            }
            else{
                return view('data/data', [
                    "wargadesa" => wargadesa::Paginate(15),
                    "checker" => 0,
                    "dusuns" => dusun::all(),
                    'title' => 'Desaboard | Cari Data'
                    ]);
            }
            
        }
        return view('data/data', [
            "wargadesa" => wargadesa::Paginate(10),
            "checker" => 1,
            "dusuns" => dusun::all(),
            'title' => 'Desaboard | Cari Data'
            ]);
    }

    public function editdata($id){
        $data = wargadesa::where('WargaID', 'like', '%'. $id. '%')->first();    
        return view('data/editdata', [
            "wargadesa" => $data,
            "dusuns" => dusun::all(),
            'title' => 'Desaboard | Edit Data'
        ]);
    }

    public function tambahdata()
    {
        return view('data/tambahdata', [
            "dusuns" => dusun::all(),
            'title' => 'Desaboard | Tambah Data'
        ]);
    }


    
}
