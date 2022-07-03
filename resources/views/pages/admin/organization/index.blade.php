@extends('layouts.main', ['title' => 'Data Organisasi', 'org' => 'active', 'data' => 'active', 'menu' => 'menu-open'])
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Organisasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Data Organisasi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="card">
        <div class="card-body table-responsive">
            <table style="width: 100%" id="orgTable" class="table table-bordered table-hover table-striped responsive">
                <thead class="text-center">
                    <tr class="bg-primary">
                        <th>Logo</th>
                        <th>Nama</th>
                        <th>Visi</th>
                        <th>Misi</th>
                        <th>Alamat</th>
                        <th>Tentang</th>
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

        table = $('#orgTable').DataTable({
            processing: true,
            autoWidth: false,
            serverSide: true,
            ajax: {
                url: '{{ route('admin.organisasi.index') }}',
            },
            columns: [{
                    data: 'logo'
                },
                {
                    data: 'name'
                },
                {
                    data: 'mission'
                },
                {
                    data: 'vision'
                },
                {
                    data: 'address'
                },
                {
                    data: 'about'
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
