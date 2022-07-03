@extends('frontend.layouts.layout')
@section('content')
    @include('frontend.layouts.navbar')

    {{-- SECTION HEADER --}}
    <header class="py-4">
        <div class="container d-flex justify-content-between align-items-center p-4">
            <div class="text">
                <h1>Sekolah Sepak Bola</h1>
                <h1>{{ $organization->name }}</h1>
                <p>{{ $organization->address }}</p>
                <a href="{{ route('register') }}" class="text-white btn btn-info btn-flat">Daftar Sekarang juga <i
                        class="fa fa-arrow-right"></i></a>
            </div>
            <div class="image">
                <img src="/img/gp.jpeg" alt="">
            </div>
        </div>
    </header>

    {{-- SECTION PLEATIH --}}
    <section class="mt-5 pt-5 pb-3" style="background-color: #ecf0f1">
        <div class="container d-flex justify-content-evenly align-items-center">
            <div class="img-coach d-flex flex-column align-items-center">
                <img src="/img/coach.png" alt="" style="max-width: 100px;border-radius: 50%">
                <strong class="mt-2">Pelatih</strong>
                <p>{{ $coach->name }}</p>
            </div>
            <div class="text-coach">
                <p class="fs-5">"Target kami adalah untuk menang, bukan untuk membuat semua pemain senang."</p>
            </div>
        </div>
    </section>

    {{-- SECTION VISI & MISI --}}
    <section class="mt-5">
        <div class="container">
            <h1 class="text-center">Visi & Misi</h1>
            <div class="d-flex justify-content-around">
                <div class="visi mt-3 col-md-6">
                    <h5 class="text-center">Visi</h5>
                    <p>{!! $organization->vision !!}</p>
                </div>
                <div class="misi mt-3 col-md-6">
                    <h5 class="text-center">Misi</h5>
                    {!! $organization->mission !!}
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION ACHIEVEMENTS --}}
    <section class="mt-5">
        <div class="container">
            <h1>Prestasi</h1>
            <div class="row">
                @foreach ($achievements as $achievement)
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body text-center">
                                <i class="fa fa-trophy " style="font-size: 250px; color: #fab005"></i>
                                <h5 class="card-title">{{ $achievement->champion }}</h5>
                                <p class="card-text">{{ $achievement->name }}</p>
                                <p><i class="fa fa-calendar"></i> {{ $achievement->date }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- SECTION ARTICLES --}}
    <section class="mt-5 pt-4 pb-4" style="background-color: #ecf0f1">
        <div class="container">
            <h1>Artikel</h1>
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text" style="max-height: 20px;">{!! $article->content !!}</p>
                                <a href="/detail/{{ $article->id }}" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    @include('frontend.layouts.footer')
@endsection
