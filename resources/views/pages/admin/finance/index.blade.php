@extends('layouts.main', ['title' => 'Data Keuangan', 'keuangan' => 'active'])
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Keuangan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Data Keuangan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="btn-group" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-primary btn-sm btn-flat mb-2" id="add"><i
                class="fas fa-plus-circle"></i>
            Tambah Data</button>
    </div>
    <div class="card">
        <div class="card-body table-responsive">
            <table id="table" class="table table-bordered table-striped">
                <thead class="text-center">
                    <tr class="bg-primary">
                        <th width="5%">No</th>
                        <th>Nama</th>
                        <th>Jenis</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Deskripsi</th>
                        <th width="10%"><i class="fas fa-cog"></i></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @includeIf('pages.admin.finance.modal')
@endsection
@push('js')
    <script type="text/javascript">
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
            }
        });
        table = $('#table').DataTable({
            processing: true,
            autoWidth: false,
            serverSide: true,
            ajax: {
                url: '{{ route('admin.keuangan.index') }}',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    searchable: false,
                    sortable: false
                },
                {
                    data: 'name'
                },
                {
                    data: 'type'
                },
                {
                    data: 'amount'
                },
                {
                    data: 'date'
                },
                {
                    data: 'description'
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

        function reset() {
            $('#name-error').html("");
            $('#type-error').html("");
            $('#amount-error').html("");
            $('#date-error').html("");
            $('#description-error').html("");
            $('#modal').find('input').val("");
        }

        function resetError() {
            $('#name-error').html("");
            $('#type-error').html("");
            $('#amount-error').html("");
            $('#date-error').html("");
            $('#description-error').html("");
            $('#description-error').html("");
        }

        $('#add').click(function() {
            $('#title').html("Tambah Keuangan");
            $('#modal').modal('show');
            reset()
        });

        $('body').on('click', '#edit', function() {
            var id = $(this).val();
            reset()
            // ajax
            $.ajax({
                type: "GET",
                url: "/admin/keuangan/" + id + '/edit',
                success: function(response) {
                    $('#title').html("Ubah Keuangan");
                    $('#modal').modal('show');
                    $('#id').val(response.id);
                    $('#name').val(response.name);
                    $('#type').val(response.type);
                    $('#amount').val(response.amount);
                    $('#date').val(response.date);
                    $('#description').val(response.description);
                }
            });
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
                        url: "/admin/keuangan/" + id,
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

        $('body').on('click', '#btn-save', function(event) {
            var id = $('#id').val();
            var name = $("#name").val();
            var type = $("#type").val();
            var amount = $("#amount").val();
            var date = $("#date").val();
            var description = $("#description").val();
            resetError()
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ route('admin.keuangan.store') }}",
                data: {
                    id: id,
                    name: name,
                    type: type,
                    amount: amount,
                    date: date,
                    description: description,
                },
                dataType: 'json',
                success: function(data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);
                        }
                        if (data.errors.type) {
                            $('#type-error').html(data.errors.type[0]);
                        }
                        if (data.errors.amount) {
                            $('#amount-error').html(data.errors.amount[0]);
                        }
                        if (data.errors.date) {
                            $('#date-error').html(data.errors.date[0]);
                        }
                        if (data.errors.description) {
                            $('#description-error').html(data.errors.description[0]);
                        }
                    }
                    if (data.success) {
                        table.ajax.reload();
                        $('#modal').find('input').val("");
                        $('#modal').modal('hide');
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        });
                    }
                },
            });
        });
    </script>
@endpush
