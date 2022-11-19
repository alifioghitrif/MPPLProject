@extends('layouts/main')
@section('container')
@php
$counter = 0;
@endphp

<div class="main-content">
    <main>
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        
            {{ session('success') }}

        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endif
        <h3>
            Data Penduduk Desa Temboro
        </h3>

        <div class="row">
            <div class="col-md-6">
                <form action="/data">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Cari..." name="search" value="{{request('search')}}">
                        <button class="btn btn-outline-secondary" type="submit" >Cari</button>
                      </div>
                </form>
            </div>
        </div>

        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Nomor KK</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Status Perkawinan</th>
                <th scope="col">Tanggal lahir</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Status dalam Keluarga</th>
                <th scope="col">Nomor Telepon</th>
                <th scope="col">Dusun</th>
                <th scope="col"> </th>
                
            </tr>
        </thead>
            <tbody>
            @if($checker>0)

                        @foreach($wargadesa as $warga)
                        @php
                            $counter++;
                        @endphp
                    <tr>
                        <td>
                            {{ $counter}}
                            </td>
                        <td>
                            {{ $warga['NIK'] }}
                            </td>
                        <td>
                            {{ $warga['Nama'] }}
                            </td>
                        <td>
                            {{ $warga['Nomor_KK'] }}
                            </td>
                       <td>
                            {{ $warga['Jenis_Kelamin'] }}
                            </td>
                       <td>
                            {{ $warga['Status_Perkawinan'] }}
                            </td>
                        <td>
                            {{ $warga['Tanggal_Lahir'] }}
                            </td>
                        <td>
                           {{ $warga['Pekerjaan']}}
                            </td>
                        <td>
                           {{ $warga['Status_Dalam_Keluarga']}}
                            </td>
                        <td>
                            {{ $warga['Nomor_Telepon'] }}
                            </td>
                        <td>
                            @foreach ($dusuns as $dusun) 
                               @if ($dusun['DusunID'] == $warga['dusun_id']) 
                                    {{ $dusun['Nama_Dusun'] }}
                                @endif
                            @endforeach
                            </td>
                        <td>
                                <a class="btn btn-primary" href="/data/edit/{{ $warga['WargaID'] }}" role="button">Edit</a>
                                <form action="/data/delete/{{ $warga['WargaID'] }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0" onclick="return confirm('Anda yakin ingin menghapus data?')">Delete</button>
                                </form>
                            </td> 
                    </tr>
                    @endforeach
                
            @endif
            
        </tbody>
        </table>
       @if ($checker>0)
         {{ $wargadesa->links() }} 
        @endif 
        @if ($checker<1)
        <h4> Data Tidak Ditemukan </h4> 
       @endif 
    
        
    </main>
</div>
@endsection