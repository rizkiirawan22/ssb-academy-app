@extends('layouts.main', ['title' => 'Ubah Artikel', 'article' => 'active', 'data' => 'active', 'menu' =>
'menu-open'])
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Ubah Artikel</li>
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
                    <h3>Ubah Artikel</h3>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('admin.artikel.update', $article->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title" class="col-sm-6">Judul</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                    name="title" value="{{ old('title', $article->title) }}">
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-sm-6">Isi</label>
                            <div class="col-sm-12 @error('content') is-invalid @enderror">
                                <div id="editor">
                                    {!! $article->content !!}
                                </div>
                                <input type="hidden" id="content" name="content" value="{{ $article->content }}">
                            </div>
                            @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="image" class="col-sm-6">Gambar</label>
                            <div class="col-sm-12">
                                <img src="{{ asset('storage/'. $article->image) }}" class="img-fluid col-sm-4 mb-2"
                                    alt="Gambar Artikel" id="img_preview">
                                <input type="hidden" id="imageOld" name="imageOld" value="{{ $article->image }}">
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                    id="image" name="image" onchange="previewImage()">
                                @error('image')
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
    var toolbarOptions = [['bold', 'italic', 'underline'],[{ 'header': [] }],[{'align' : []}]];
    var quill = new Quill('#editor', {
    modules: {
        toolbar: toolbarOptions
    },
    theme: 'snow'
    });

    quill.on('text-change', function(delta, oldDelta, source) {
        document.getElementById("content").value = quill.root.innerHTML;
    });


    function previewImage() {
        $('#img_preview').show()
        const article_image = document.querySelector('#image');
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