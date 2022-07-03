@extends('layouts.main', ['title' => 'Tambah Absensi', 'absensi' => 'active'])
@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Tambah Absensi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3>Tambah Absensi</h3>
                    </div>
                    <div class="card-body p-5">
                        <form action="{{ route('admin.absensi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-sm-6">Nama Pertemuan</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" required>
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class="col-sm-6">Tanggal</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control @error('date') is-invalid @enderror"
                                        id="date" name="date" required>
                                    @error('date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <table class="table table-sm">
                                <thead>
                                    <th>Nama</th>
                                    <th>Status</th>
                                </thead>
                                <tbody>
                                    <form action="{{ route('admin.absensi.store') }}">
                                        @csrf
                                        @foreach ($members as $member)
                                            <tr>
                                                <td>{{ $member->name }}</td>
                                                <td>
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                        <label class="btn btn-sm btn-danger active">
                                                            <input type="radio" name="status{{ $loop->iteration }}"
                                                                id="option1" value="0" checked>A
                                                        </label>
                                                        <label class="btn btn-sm btn-primary">
                                                            <input type="radio" name="status{{ $loop->iteration }}"
                                                                id="option2" value="1">H
                                                        </label>
                                                        <label class="btn btn-sm btn-warning">
                                                            <input type="radio" name="status{{ $loop->iteration }}"
                                                                id="option3" value="2">S
                                                        </label>
                                                        <label class="btn btn-sm btn-success">
                                                            <input type="radio" name="status{{ $loop->iteration }}"
                                                                id="option3" value="3">I
                                                        </label>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </form>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        var quill = new Quill('#editor1', {
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{
                        'header': []
                    }],
                    [{
                        'align': []
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                ]
            },
            theme: 'snow'
        });

        var quill2 = new Quill('#editor2', {
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{
                        'header': []
                    }],
                    [{
                        'align': []
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                ]
            },
            theme: 'snow'
        });

        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("vision").value = quill.root.innerHTML;
        });
        quill2.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("mission").value = quill2.root.innerHTML;
        });

        function previewLogo() {
            $('#img_preview').show()
            const article_image = document.querySelector('#logo');
            const imgPreview = document.querySelector('#img_preview');
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(article_image.files[0]);
            oFReader.onload = function(oFEvent) {
                imgPreview.src = oFEvent.target.result;
            }
        }
    </script>
@endpush
