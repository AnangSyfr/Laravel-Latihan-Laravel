@extends('layout/main')

@section('title','Web Laravel | Form Edit Data Mahasiswa')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3 class="mt-2">Edit Data Mahasiswa</h3>
            <form action="{{ url('/students',$student->id) }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="col-md-3 my-4">
                    <img src="{{ Storage::url($student->photo) }}" class="img-fluid">
                </div>
                <div class="form-group">
                    <label for="photo">Foto</label>
                    <input type="file" name="photo" id="photo" class="form-control @error('photo') is-invalid @enderror">
                    @error('photo')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ $student->nama }}" placeholder="Masukkan Nama">
                    @error('nama')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nim">Nim</label>
                    <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" id="nim" value="{{ $student->nim }}" placeholder="Masukkan Nim">
                    @error('nim')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Masukkan Email" value="{{ $student->email }}">
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

</div>
@endsection
