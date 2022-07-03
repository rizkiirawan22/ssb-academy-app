@extends('layouts.main', ['title' => 'Data Diri', 'member' => 'active'])
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Data Diri</li>
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
                    <h3>Data Diri</h3>
                </div>
                <div class="card-body p-5">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class="col-sm-6">Nama Lengkap</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $member->name) }}" readonly>
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
                                        value="{{ old('place_of_birth', $member->place_of_birth) }}" readonly>
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
                                        id="address" name="address" value="{{ old('address', $member->address) }}"
                                        readonly>
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
                                        id="phone" name="phone" value="{{ old('phone', $member->phone) }}" readonly>
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
                                    <a href="{{ asset('storage/' . $member->photo) }}" target="_blank">
                                        <i class="fas fa-eye"></i> Tampilkan</a>
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
                                        class="custom-select @error('gender') is-invalid @enderror" disabled>
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="L" {{ $member->gender == 'L' ? 'selected' : '' }}>Laki Laki
                                        </option>
                                        <option value="P" {{ $member->gender == 'P' ? 'selected' : '' }}>Perempuan
                                        </option>
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
                                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                                        id="date_of_birth" name="date_of_birth"
                                        value="{{ old('date_of_birth', $member->date_of_birth) }}" readonly>
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
                                        id="email" name="email" value="{{ old('email', $member->email) }}" readonly>
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
                                        value="{{ old('guardian_phone', $member->guardian_phone) }}" readonly>
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
                                    <a href="{{ asset('storage/' . $member->birth_certificate) }}" target="_blank">
                                        <i class="fas fa-eye"></i> Tampilkan</a>
                                    @error('birth_certificate')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection