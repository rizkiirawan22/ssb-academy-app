@extends('layouts.main', ['title' => 'Data Anggota', 'member' => 'active'])
@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Anggota</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Data Anggota</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table style="width: 100%" id="articleTable"
                            class="table table-bordered table-hover table-striped responsive">
                            <thead class="bg-primary text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Status</th>
                                    <th width="10%"><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('js')
<script type="text/javascript">
    var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });

        @if (session('success'))
            Toast.fire({
            icon: 'success',
            title: '{!! session('success') !!}'
            });
        @endif

        table = $('#articleTable').DataTable({
            processing: true,
            autoWidth: false,
            serverSide: true,
            ajax: {
                url: '{{ route('admin.anggota.index') }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'photo'
                },
                {
                    data: 'name'
                },
                {
                    data: 'gender'
                },
                {
                    data: 'status'
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