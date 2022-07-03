@extends('layouts.main', ['title' => 'Data Absensi', 'absensi' => 'active'])
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Absensi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Data Absensi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="btn-group" role="group" aria-label="Basic example">
        <a href="{{ route('admin.absensi.create') }}" class="btn btn-primary btn-sm btn-flat mb-2"><i
                class="fas fa-plus-circle"></i>
            Tambah Absensi</a>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table style="width: 100%" id="table" class="table table-bordered table-hover table-striped responsive">
                <thead class="text-center">
                    <tr class="bg-primary">
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th width="10%"><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        @if (session('success'))
            Toast.fire({
                icon: 'success',
                title: '{!! session('success') !!}'
            });
        @endif

        table = $('#table').DataTable({
            processing: true,
            autoWidth: false,
            serverSide: true,
            ajax: {
                url: '{{ route('admin.absensi.index') }}',
            },
            columns: [{
                    data: 'name'
                },
                {
                    data: 'date'
                },
                {
                    data: 'action',
                    searchable: false,
                    sortable: false
                },
            ],
            columnDefs: [{
                className: 'text-center',
                targets: '_all'
            }]
        });
    </script>
@endpush
