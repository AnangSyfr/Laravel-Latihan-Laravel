@extends('layout/main')

@section('title','Web Laravel | Daftar Mahasiswa')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3 class="mt-2">DAFTAR MAHASISWA</h3>

            <a href="{{ url('/students/create') }}" class="btn btn-success btn-sm my-3">Tambah Data</a>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <ul class="list-group">
            @foreach($students  as $std)
              <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $loop->iteration.'. '.ucwords($std->nama) }}
                <a href="{{ url('/students/'.$std->id) }}" class="badge badge-primary badge-pill">detail</a>
              </li>
            @endforeach
            </ul>
        </div>
    </div>

</div>
@endsection
