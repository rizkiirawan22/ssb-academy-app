@extends('layouts.main', ['title' => 'Data Artikel', 'article' => 'active', 'data' => 'active', 'menu' => 'menu-open'])
@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Artikel</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                    <li class="breadcrumb-item active">Data Artikel</li>
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
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary mb-2"><i
                            class="fas fa-plus-circle"></i>
                        Tambah Data</a>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table style="width: 100%" id="articleTable"
                            class="table table-bordered table-hover table-striped responsive">
                            <thead class="bg-primary text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Isi</th>
                                    <th>Author</th>
                                    <th width="10%"><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tfoot class="bg-primary text-center">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Tanggal</th>
                                    <th>Isi</th>
                                    <th>Author</th>
                                    <th width="10%"><i class="fas fa-cog"></i></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@includeIf('pages.student.modal')
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
                url: '{{ route('admin.artikel.index') }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'image'
                },
                {
                    data: 'title'
                },
                {
                    data: 'date'
                },
                {
                    data: 'content'
                },
                {
                    data: 'author'
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
        
        $('body').on('click', '#delete', function() {
            var id = $(this).val();
            Swal.fire({
                title: 'Yakin Hapus ?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya Hapus!',
                confirmButtonColor: '#FF0000',
                cancelButtonText: 'Tidak',
                cancelButtonColor: '#3085d6',
            }).then(function(result) {
                if (result.value) {
                    $.ajax({
                        type: "DELETE",
                        url: "/admin/artikel/" + id,
                        success: function(response) {
                            if (response.success) {
                                Toast.fire({
                                    icon: 'success',
                                    title: response.success
                                });
                                table.ajax.reload();
                            }
                            if (response.error) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal...',
                                    text: response.error,
                                })
                            }
                        }
                    });
                }
            })
        });
</script>
@endpush