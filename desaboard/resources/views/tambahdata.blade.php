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
        <form action="/tambah-data", method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="nik">NIK</label>
                <input class="form-control" type="text" id="nik" placeholder="NIK"  required autofocus name="nik"> 

            </div>
            <div class="form-group mb-3">
                <label for="namaFormControllInput">Nama Lengkap</label>
                <input class="form-control" type="text" id="namaFormControllInput" placeholder="Nama Lengkap" required autofocus name="nama"> 
            </div>
            <div class="form-group mb-3">
                <label for="namaFormControllInput">Nomor KK</label>
                <input class="form-control" type="text" id="namaFormControllInput" placeholder="Nomor KK" required autofocus name="nomorkk"> 
            </div>
            <div class="form-group mb-3">
                <label for="jkFormControllInput">Jenis Kelamin</label>
                <select class="form-control" id="jkFormControllInput" required autofocus name="jk">
                    @php
                    foreach($JK as $jk){
                       echo('<option value="'. $jk. '"');
                        echo('>'.$jk. '</option>') ;
                    }
                    @endphp
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="statusFormControllInput">Status Perkawinan</label>
                <select class="form-control" id="statusFormControllInput" required autofocus name="perkawinan">
                    @php
                        foreach($statuses as $status){
                           echo('<option value="'. $status. '"');
                            echo('>'.$status. '</option>') ;
                        }
                    @endphp
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="ttlFormControllInput">Tanggal Lahir</label>
                <input class="form-control" type="date" id="ttlFormControllInput" required autofocus name="ttl"> 
            </div>
            <div class="form-group mb-3">
                <label for="pekerjaanFormControllInput">Pekerjaan</label>
                <input class="form-control" type="text" id="pekerjaanFormControllInput" placeholder="Pekerjaan" required autofocus name="pekerjaan"> 
            </div>
            <div class="form-group mb-3">
                <label for="statusFormControllInput">Status dalam Keluarga</label>
                <select class="form-control" id="statusFormControllInput" required autofocus name="status">
                    @php
                        foreach($kedudukans as $kedudukan){
                           echo('<option value="'. $kedudukan. '"');
                            echo('>'.$kedudukan. '</option>') ;
                        }
                    @endphp
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="noFormControllInput">Nomor Telepon</label>
                <input class="form-control" type="text" id="noFormControllInput" placeholder="Nomor Telepon" required autofocus name="nomor"> 
            </div>
            <div class="form-group mb-3">
                <label for="statusFormControllInput">Dusun Tinggal</label>
            <select class="form-control" id="statusFormControllInput" required autofocus name="dusun">
                @php
                    foreach($dusuns as $dusun){
                       echo('<option value="'. $dusun['DusunID']. '"');
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