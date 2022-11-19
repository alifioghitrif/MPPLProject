@extends('layouts/main')
@section('container')
<div class="main-content">
    <main>
        <h3>
            Tambah Data Penduduk Desa Temboro
        </h3>
        @php
            $statuses = ['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati'];
            $JK = ['Laki-Laki', 'Perempuan'];
            $kedudukans = ['Kepala Keluarga', 'Suami', 'Istri', 'Anak', 'Menantu', 'Cucu', 'Orang Tua', 'Mertua', 'Famili Lain']
        @endphp
        <form action="/tambah-data", method="post">
            @csrf
            <div class="form-group mb-3">
                <label for="NIK">NIK</label>
                <input class="form-control" type="text" id="NIK" placeholder="NIK"  required autofocus name="NIK"> 

            </div>
            <div class="form-group mb-3">
                <label for="Nama">Nama Lengkap</label>
                <input class="form-control" type="text" id="Nama" placeholder="Nama Lengkap" required autofocus name="Nama"> 
            </div>
            <div class="form-group mb-3">
                <label for="Nomor_KK">Nomor KK</label>
                <input class="form-control" type="text" id="Nomor_KK" placeholder="Nomor KK" required autofocus name="Nomor_KK"> 
            </div>
            <div class="form-group mb-3">
                <label for="Jenis_Kelamin">Jenis Kelamin</label>
                <select class="form-control" id="Jenis_Kelamin" required autofocus name="Jenis_Kelamin">
                    @php
                    foreach($JK as $jk){
                       echo('<option value="'. $jk. '"');
                        echo('>'.$jk. '</option>') ;
                    }
                    @endphp
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="Status_Perkawinan">Status Perkawinan</label>
                <select class="form-control" id="Status_Perkawinan" required autofocus name="Status_Perkawinan">
                    @php
                        foreach($statuses as $status){
                           echo('<option value="'. $status. '"');
                            echo('>'.$status. '</option>') ;
                        }
                    @endphp
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="Tanggal_Lahir">Tanggal Lahir</label>
                <input class="form-control" type="date" id="Tanggal_Lahir" required autofocus name="Tanggal_Lahir"> 
            </div>
            <div class="form-group mb-3">
                <label for="Pekerjaan">Pekerjaan</label>
                <input class="form-control" type="text" id="Pekerjaan" placeholder="Pekerjaan" required autofocus name="Pekerjaan"> 
            </div>
            <div class="form-group mb-3">
                <label for="Status_Dalam_Keluarga">Status dalam Keluarga</label>
                <select class="form-control" id="Status_Dalam_Keluarga" required autofocus name="Status_Dalam_Keluarga">
                    @php
                        foreach($kedudukans as $kedudukan){
                           echo('<option value="'. $kedudukan. '"');
                            echo('>'.$kedudukan. '</option>') ;
                        }
                    @endphp
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="Nomor_Telepon">Nomor Telepon</label>
                <input class="form-control" type="text" id="Nomor_Telepon" placeholder="Nomor Telepon" required autofocus name="Nomor_Telepon"> 
            </div>
            <div class="form-group mb-3">
                <label for="dusun_id">Dusun Tinggal</label>
            <select class="form-control" id="dusun_id" required autofocus name="dusun_id">
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