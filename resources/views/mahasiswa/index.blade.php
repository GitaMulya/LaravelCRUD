@extends('layout/main')

@section('judul', 'Data Mahasiswa')

@section('container')
  <div class="container">
    <div class="row">
      <h1 class="mt-2">Data Mahasiswa Ilkom</h1>
      <a href="/mahasiswa/create" class="btn btn-outline-primary col-2 mt-3 mb-2 ms-3">Tambah Data</a>
        @if (session('status'))
            <div class="alert alert-success ms-3">
              {{ session('status') }}
            </div>
        @endif    
      <table class="table table-striped table-bordered table-hover mt-2 ms-3">
        <thead class="table-white"> 
            <tr>
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Kelas</th>
                <th scope="col">Nilai</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
       
        <tbody>

            @foreach ($mahasiswa as $mhs) 
            <tr>
                <td scope="row">{{ $loop->iteration}}</td>
                <td>{{ $mhs->NIM }}</td>
                <td>{{ $mhs->Nama }}</td>
                <td>{{ $mhs->Kelas }}</td>
                <td>{{ $mhs->Nilai }}</td>
                <td>
                    <a href="/mahasiswa/{{$mhs->id}}/edit" class="btn btn-outline-success btn-sm">Edit</a>
                    <a href="/mahasiswa/{{$mhs->id}}/delete" class="btn btn-outline-danger btn-sm">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>

      <div class="col-4 mt-4">
        <h5>Tabel Frekuensi</h5>
            <table class="table table-striped table-bordered table-hover mt-2">
              <thead>
                <tr>
                  <td scope="col"><b>Nilai</b></td>
                  <td scope="col"><b>Frekuensi</b></td>
                </tr>
              </thead>
              <tbody>
                @foreach ($frekuensi as $Nilai)                 
                  <tr>
                    <td> {{ $Nilai->Nilai }} </td>
                    <td> {{ $Nilai->frekuensi }}</td>
                  </tr>                  
                @endforeach
                  <tr>
                    <td> <b>Total Nilai:</b>  </td>
                    <td> {{ $totalNilai }}</td>
                  </tr>
                  <tr>
                    <td> <b>Total Frekuensi:</b>  </td>
                    <td> {{ $totalfrekuensi }}</td>
                  </tr>
              </tbody>
           </table>
      </div>
      <div class="col-4 mt-4 ms-4">
        <h5>Tabel Min, Max, dan Rata-rata Nilai</h5>
            <table class="table table-striped table-bordered table-hover mt-2">
              <thead>
                <tr>
                  <td scope="col"><b>Nilai Max</b></td>
                  <td scope="col"><b>Nilai Min</b></td>
                  <td scope="col"><b>Nilai Rata-rata</b></td>
                </tr>
              </thead>
              <tbody>               
                  <tr>
                    <td> <label for="max" class="ml-4">{{ $max }}</label> </td>
                    <td><label for="min" class="ml-4">{{ $min }}</label></td>
                    <td><label for="rata2" class="ml-4">{{ $rata2 }}</label></td>
                  </tr>                  
              </tbody>
           </table>
      </div>     
    </div>
  </div>
@endsection
