@extends('layouts.main', ['title' => 'Data Pelatih','coach' => 'active', 'data' => 'active', 'menu'
=>
'menu-open'])
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Data Pelatih</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Data Pelatih</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-primary btn-sm btn-flat mb-2" id="add"><i class="fas fa-plus-circle"></i>
        Tambah Data</button>
</div>
<div class="card">
    <div class="card-body table-responsive">
        <table style="width: 100%" id="coachTable" class="table table-bordered table-hover table-striped responsive">
            <thead class="text-center">
                <tr class="bg-primary">
                    <th width="5%">No</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th width="10%"><i class="fas fa-cog"></i></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('pages.admin.coach.modal')
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
        table = $('#coachTable').DataTable({
            processing: true,
            autoWidth: false,
            serverSide: true,
            ajax: {
                url: '{{ route('admin.pelatih.index') }}',
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
                    data: 'place_of_birth'
                },
                {
                    data: 'date_of_birth'
                },
                {
                    data: 'phone'
                },
                {
                    data: 'address'
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
            $('#place-of-birth-error').html("");
            $('#date-of-birth-error').html("");
            $('#phone-error').html("");
            $('#address-error').html("");
            $('#coachModal').find('input').val("");
        }

        function resetError(){
            $('#name-error').html("");
            $('#place-of-birth-error').html("");
            $('#date-of-birth-error').html("");
            $('#phone-error').html("");
            $('#address-error').html("");
        }

        $('#add').click(function() {
            $('#coachTitle').html("Tambah Pelatih");
            $('#coachModal').modal('show');
            reset()
        });

        $('body').on('click', '#edit', function() {
            var id = $(this).val();
            reset()
            // ajax
            $.ajax({
                type: "GET",
                url: "/admin/pelatih/" + id + '/edit',
                success: function(response) {
                    $('#coachTitle').html("Ubah Pelatih");
                    $('#coachModal').modal('show');
                    $('#id').val(response.id);
                    $('#name').val(response.name);
                    $('#place_of_birth').val(response.place_of_birth);
                    $('#date_of_birth').val(response.date_of_birth);
                    $('#phone').val(response.phone);
                    $('#address').val(response.address);
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
                        url: "/admin/pelatih/" + id,
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
            var place_of_birth = $("#place_of_birth").val();
            var date_of_birth = $("#date_of_birth").val();
            var phone = $("#phone").val();
            var address = $("#address").val();
            resetError()
            // ajax
            $.ajax({
                type: "POST",
                url: "{{ route('admin.pelatih.store') }}",
                data: {
                    id:id,
                    name: name,
                    place_of_birth: place_of_birth,
                    date_of_birth: date_of_birth,
                    phone: phone,
                    address: address,
                },
                dataType: 'json',
                success: function(data) {
                    if (data.errors) {
                        if (data.errors.name) {
                            $('#name-error').html(data.errors.name[0]);
                        }
                        if (data.errors.place_of_birth) {
                            $('#place-of-birth-error').html(data.errors.place_of_birth[0]);
                        }
                        if (data.errors.date_of_birth) {
                            $('#date-of-birth-error').html(data.errors.date_of_birth[0]);
                        }
                        if (data.errors.phone) {
                            $('#phone-error').html(data.errors.phone[0]);
                        }
                        if (data.errors.address) {
                            $('#address-error').html(data.errors.address[0]);
                        }
                    }
                    if (data.success) {
                        table.ajax.reload();
                        $('#coachModal').find('input').val("");
                        $('#coachModal').modal('hide');
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