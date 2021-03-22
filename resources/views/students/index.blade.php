@extends('layout/main')

@section('judul', 'Daftar Mahasiswa')

@section('container')
  <div class="container">
    <div class="row">
     <div class="col-7">
       <h1 class="mt-3">Daftar Mahasiswa Ilkom</h1> 
       <a href="/students/create" class="btn btn-outline-primary my-3">Tambah Data</a>

        @if (session('status'))
          <div class="alert alert-success" >
            {{ session('status') }}
          </div>
        @endif

        <ul class="list-group">
         @foreach($students as $student)
         <li class="list-group-item d-flex justify-content-between align-items-center">
            {{$student->Nama}}
            <a href="/students/{{ $student->id}}" class="badge bg-info">Detail</a>
         </li>
          @endforeach
        </ul>
     </div>      
    </div>
  </div>
@endsection
