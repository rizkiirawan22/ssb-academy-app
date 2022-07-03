@extends('layouts.main', ['title' => 'Profile', 'member' => 'active'])
@section('content-header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
@endsection
@section('content')
<div class="container">
    <div class="main-body">
        <div class="card">
            <div class="card-header bg-primary">
                <h3>Profile</h3>
            </div>
            <div class="card-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="{{ asset('storage/'.$member->photo) }}" alt="Admin" class="rounded-circle"
                                        width="250" height="250">
                                    <div class="mt-3 mb-5">
                                        <h3>{{ $member->name }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Nama Lengkap</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->name }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tempat Lahir</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->place_of_birth }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Tanggal Lahir</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->date_of_birth }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Jenis Kelamin</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->gender }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->address }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->email }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Telepon</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ $member->phone }}
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Alamat</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{$member->address}}
                                    </div>
                                </div>
                                <hr>
                                {{-- <div class="row">
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="button" class="btn btn-info" id="profileEdit"
                                            value="{{ $member->lecturer_id }}">Ubah</button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection