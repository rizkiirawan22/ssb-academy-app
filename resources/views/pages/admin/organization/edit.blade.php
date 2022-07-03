@extends('layouts.main', ['title' => 'Ubah SSB', 'org' => 'active', 'data' => 'active', 'menu' =>
'menu-open'])
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Ubah SSB</li>
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
                    <h3>Ubah SSB</h3>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('admin.organisasi.update', $org->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name" class="col-sm-6">Nama</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" value="{{ old('name', $org->name) }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vision" class="col-sm-6">Visi</label>
                            <div class="col-sm-12 @error('vision') is-invalid @enderror">
                                <div id="editor1">
                                    {!! $org->vision !!}
                                </div>
                                <input type="hidden" id="vision" name="vision" value="{{ $org->vision }}">
                            </div>
                            @error('vision')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="mission" class="col-sm-6">Misi</label>
                            <div class="col-sm-12 @error('mission') is-invalid @enderror">
                                <div id="editor2">
                                    {!! $org->mission !!}
                                </div>
                                <input type="hidden" id="mission" name="mission" value="{{ $org->mission }}">
                            </div>
                            @error('mission')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-6">Alamat</label>
                            <div class="col-sm-12">
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                                    name="address">{{ old('address',$org->address) }}</textarea>
                                @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about" class="col-sm-6">Tentang</label>
                            <div class="col-sm-12">
                                <textarea class="form-control @error('about') is-invalid @enderror" id="about"
                                    name="about">{{ old('about',$org->about) }}</textarea>
                                @error('about')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logo" class="col-sm-6">Logo</label>
                            <div class="col-sm-12">
                                <img src="{{ asset('storage/'. $org->logo) }}" class="img-fluid col-sm-4 mb-2"
                                    alt="Logo" id="img_preview">
                                <input type="hidden" id="logoOld" name="logoOld" value="{{ $org->logo }}">
                                <input type="file" class="form-control-file @error('logo') is-invalid @enderror"
                                    id="logo" name="logo" onchange="previewLogo()">
                                @error('logo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
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
        toolbar: [['bold', 'italic', 'underline'],[{ 'header': [] }],[{'align' : []}], [{ 'list': 'ordered'}, { 'list': 'bullet' }],]
    },
    theme: 'snow'
    });

    var quill2 = new Quill('#editor2', {
    modules: {
        toolbar: [['bold', 'italic', 'underline'],[{ 'header': [] }],[{'align' : []}], [{ 'list': 'ordered'}, { 'list': 'bullet' }],]
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