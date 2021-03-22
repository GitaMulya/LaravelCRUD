@extends('layout/main')

@section('judul', 'Detail Mahasiswa')

@section('container')
  <div class="container">
    <div class="row">
     <div class="col-7">
      <h1 class="mt-3">Detail Mahasiswa Ilkom</h1> 
      <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">{{$student->Nama}}</h5>
                <p class="card-subtitle mb-2 text-muted">{{$student->NIM}}</p>
                <p class="card-text">{{$student->Kelas}}</p>
                <p class="card-text">{{$student->Nilai}}</p>
                <a href="{{$student->id}}/edit" class="btn btn-outline-success btn-sm">Edit</a>
                <form action="/students/{{$student->id}}" method="post" class="d-inline">
                 @method('delete')
                 @csrf 
                 <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                </form>
                <a href="/students" class="btn btn-outline-secondary btn-sm">Kembali</a>
            </div>
      </div>
     </div>      
    </div>
  </div>
@endsection
