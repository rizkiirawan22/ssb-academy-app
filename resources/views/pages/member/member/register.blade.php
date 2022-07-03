@extends('layouts.main', ['title' => 'Daftar Anggota', 'member' => 'active'])
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Daftar Anggota</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3>Daftar Anggota</h3>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('anggota.registerStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name" class="col-sm-6">Nama Lengkap</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name', $user->name) }}">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="place_of_birth" class="col-sm-6">Tempat Lahir</label>
                                    <div class="col-sm-12">
                                        <input type="text"
                                            class="form-control @error('place_of_birth') is-invalid @enderror"
                                            id="place_of_birth" name="place_of_birth"
                                            value="{{ old('place_of_birth') }}">
                                        @error('place_of_birth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address" class="col-sm-6">Alamat</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"
                                            id="address" name="address" value="{{ old('address') }}">
                                        @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-sm-6">Telepon</label>
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo" class="col-sm-6">Foto</label>
                                    <div class="col-sm-12">
                                        <img src="" class="img-fluid col-sm-4 mb-2" alt="Foto Anggota" id="img_preview">
                                        <input type="file"
                                            class="form-control-file @error('photo') is-invalid @enderror" id="photo"
                                            name="photo" onchange="previewImage()">
                                        @error('photo')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="gender" class="col-sm-6">Jenis Kelamin</label>
                                    <div class="col-sm-12">
                                        <select name="gender" id="gender"
                                            class="custom-select @error('gender') is-invalid @enderror">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="L">Laki Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date_of_birth" class="col-sm-6">Tanggal Lahir</label>
                                    <div class="col-sm-12">
                                        <input type="date"
                                            class="form-control @error('date_of_birth') is-invalid @enderror"
                                            id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}">
                                        @error('date_of_birth')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-6">Email</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email', $user->email) }}">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="guardian_phone" class="col-sm-6">Telepon Wali</label>
                                    <div class="col-sm-12">
                                        <input type="number"
                                            class="form-control @error('guardian_phone') is-invalid @enderror"
                                            id="guardian_phone" name="guardian_phone"
                                            value="{{ old('guardian_phone') }}">
                                        @error('guardian_phone')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="birth_certificate" class="col-sm-6">Akta Kelahiran</label>
                                    <div class="col-sm-12">
                                        <input type="file"
                                            class="form-control-file @error('birth_certificate') is-invalid @enderror"
                                            id="birth_certificate" name="birth_certificate">
                                        @error('birth_certificate')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i>
                                Daftar</button>
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
    $('#img_preview').hide()

    function previewImage() {
        $('#img_preview').show()
        const article_image = document.querySelector('#photo');
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