@extends('layout/main')

@section('judul', 'Form Tambah Data Mahasiswa Ilkom')

@section('container')
  <div class="container">
    <div class="row">
     <div class="col-10">
      <h1 class="mt-3">Form Tambah Data Mahasiswa Ilkom</h1> 

      <form method="post" action="/mahasiswa">
            @csrf
            <div class="form-group">
                <label for="NIM">NIM</label>
                <input type="text" class="form-control @error('NIM') is-invalid @enderror" id="NIM" placeholder="Masukkan NIM" name="NIM" value="{{old('NIM')}}">
                @error('NIM')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Nama">Nama</label>
                <input type="text" class="form-control @error('Nama') is-invalid @enderror" id="Nama" placeholder="Masukkan Nama" name="Nama" value="{{old('Nama')}}">
                @error('Nama')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Kelas">Kelas</label>
                <input type="text" class="form-control @error('Kelas') is-invalid @enderror" id="Kelas" placeholder="Masukkan Kelas" name="Kelas" value="{{old('Kelas')}}">
                @error('Kelas')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="Nilai">Nilai</label>
                <input type="text" class="form-control @error('Nilai') is-invalid @enderror" id="Nilai" placeholder="Masukkan Nilai" name="Nilai" value="{{old('Nilai')}}">
                @error('Nilai')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <button type="sumbit" class="btn btn-outline-primary my-3">Tambah Data</button>
            <a href="/mahasiswa" class="btn btn-outline-danger">Batal</a>
      </form>

     </div>      
    </div>
  </div>
@endsection
