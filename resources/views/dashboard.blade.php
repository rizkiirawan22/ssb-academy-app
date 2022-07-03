@extends('layouts.main', ['title' => 'Dashboard', 'dashboard' => 'active'])
@section('content')
    @role('admin')
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $count_member }}</h3>
                                <p>Anggota</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ route('admin.anggota.index') }}" class="small-box-footer">Detail <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $count_coach }}</h3>
                                <p>Pelatih</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('admin.pelatih.index') }}" class="small-box-footer">Detail <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $count_achievement }}</h3>
                                <p>Prestasi</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ route('admin.prestasi.index') }}" class="small-box-footer">Detail <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-secondary">
                            <div class="inner">
                                <h3>Rp {{ $money }}</h3>
                                <p>Uang Kas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="" class="small-box-footer">-</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endrole
    @role('member')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 image-head">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ asset('storage/' . $member->photo) }}" class="rounded-circle img-fluid col-2"
                            alt="User Image">
                    </div>
                </div>
                <div class="col-12 head text-center">
                    <span>Hi, {{ $member->name }} !</span>
                </div>
                <div class="col-12 head text-center">
                    <span>Welcome :)</span>
                    <h3 class="text-danger">Let's get started</h3>
                </div>
            </div>
        </div>
    @endrole
@endsection
