@extends('layout/main')

@section('title','Web Laravel | Form Tambah Data Mahasiswa')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3 class="mt-2">Tambah Data Mahasiswa</h3>
            <form action="{{ url('/students') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama">
                    @error('nama')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="Masukkan Nim">
                    @error('nim')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan Email">
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
    </div>

</div>
@endsection
