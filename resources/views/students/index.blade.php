@extends('layouts/app')

@section('title','Web Laravel | Daftar Mahasiswa')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mt-2">DAFTAR MAHASISWA</h3>

            <a href="{{ url('/students/create') }}" class="btn btn-success btn-sm my-3">Tambah Data</a>

            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif


            <table class="table table-bordered" id="users-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Nim</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Detail</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
$(function() {
    $.noConflict()
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('json_students') }}",
        columns: [
            { data: 'nama', name: 'nama' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            { "render": function ( data, type, row ) {
            var url = '{{ url('students/')}}';
                  return "<a class='badge badge-info' href='"+url+"/"+row.id+"'>Detail</a>";
              }
            },
        ]
    });
});
</script>
@endpush
