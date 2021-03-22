@extends('layout/main')

@section('judul', 'About')

@section('container')
  <div class="container-fluid">
    <div class="row">
      <h1 class="mt-3">Hello, {{$nama}}!</h1>    
    </div>
  </div>
@endsection
