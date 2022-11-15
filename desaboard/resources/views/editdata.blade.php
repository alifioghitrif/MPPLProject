@extends('layouts/main')
@section('container')
<div class="main-content">
    <main>
        {{-- <div class="text-right mb-3">
            <a href="/data" class="btn btn-primary pull-right">Back</a>
        </div> --}}
        <h3>
            Edit Data Penduduk Desa Temboro
        </h3>
        @php
            $statuses = ['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati'];
            $JK = ['Laki-Laki', 'Perempuan'];
            $kedudukans = ['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain']
        @endphp
        <form action="/data/edit/{{ $wargadesa['WargaID'] }}">
            @method('put')
            @csrf
            <div class="form-group mb-3">
                <label for="nik">NIK</label>
                <input class="form-control" type="text" id="nik" placeholder="NIK" value= "{{ $wargadesa['NIK']   }}" required autofocus name="NIK"> 
            </div>
            <div class="form-group mb-3">
                <label for="nama">Nama Lengkap</label>
                <input class="form-control" type="text" id="nama" placeholder="Nama Lengkap" value="{{ $wargadesa['Nama'] }}" required autofocus name="nama"> 
            </div>
            <div class="form-group mb-3">
                <label for="nomorkk">Nomor KK</label>
                <input class="form-control" type="text" id="nomorkk" placeholder="Nomor KK" value="{{ $wargadesa['Nomor_KK'] }}" required autofocus name="nomorkk"> 
            </div>
            <div class="form-group mb-3">
                <label for="jk">Jenis Kelamin</label>
                <select class="form-control" id="jk" required autofocus name="jk">
                    @php
                    foreach($JK as $jk){
                       echo('<option value="'. $jk. '"');
                    if ($wargadesa['Jenis_Kelamin'] == $jk){
                        echo("selected");
                    } 
                        echo('>'.$jk. '</option>') ;
                    }
                @endphp
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="perkawinan">Status Perkawinan</label>
                <select class="form-control" id="perkawinan" required autofocus name="perkawinan">
                    @php
                        foreach($statuses as $status){
                           echo('<option value="'. $status. '"');
                        if ($wargadesa['Status_Perkawinan'] == $status){
                            echo("selected");
                        } 
                            echo('>'.$status. '</option>') ;
                        }
                    @endphp
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="ttl">Tanggal Lahir</label>
                <input class="form-control" type="date" id="ttl"value="{{ $wargadesa['Tanggal_Lahir'] }}" required autofocus name="ttl"> 
            </div>
            <div class="form-group mb-3">
                <label for="pekerjaan">Pekerjaan</label>
                <input class="form-control" type="text" id="pekerjaan" placeholder="Pekerjaan" value="{{ $wargadesa['Pekerjaan'] }}" required autofocus name="pekerjaan"> 
            </div>
            <div class="form-group mb-3">
                <label for="status">Status dalam Keluarga</label>
                <select class="form-control" id="status" required autofocus name="status">
                    @php
                        foreach($kedudukans as $kedudukan){
                           echo('<option value="'. $kedudukan. '"');
                        if ($wargadesa['Status_Dalam_Keluarga'] == $kedudukan){
                            echo("selected");
                        } 
                            echo('>'.$kedudukan. '</option>') ;
                        }
                    @endphp
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="nomor">Nomor Telepon</label>
                <input class="form-control" type="text" id="nomor" placeholder="Nomor Telepon" value="{{ $wargadesa['Nomor_Telepon'] }}" required autofocus name="nomor"> 
            </div>
            <div class="form-group mb-3">
                <label for="dusun">Dusun Tinggal</label>
            <select class="form-control" id="dusun" required autofocus name="dusun">
                @php
                    foreach($dusuns as $dusun){
                       echo('<option value="'. $dusun['DusunID']. '"');
                    if ($wargadesa['dusun_id'] == $dusun['DusunID']){
                        echo("selected");
                    } 
                        echo('>'.$dusun['Nama_Dusun']. '</option>') ;
                    }
                @endphp
            </select>
            </div>
            
            <div>
                <button type="submit" class="btn btn-primary mb-3 justify-content-end">Submit</button>
            </div>
            
        </form>
        
        
    </main>
</div>
@endsection