@extends('layout/main')

@section('title','Web Laravel | Detail Mahasiswa')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3 class="mt-2"></h3>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> {{ $student->nama }} </h5>
                    <h6 class="card-subtitle mb-2 text-muted"> {{ $student->nim }} </h6>
                    <p class="card-text">{{ $student->email }} </p>

                    <button type="submit" class="btn btn-info">edit</button>
                    <button type="submit" class="btn btn-danger">delete</button>
                    <a type="submit" class="btn btn-success">kembali</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
