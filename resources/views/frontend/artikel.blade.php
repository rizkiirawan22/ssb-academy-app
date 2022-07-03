@extends('frontend.layouts.layout')
@section('content')
    @include('frontend.layouts.navbar')

    <section class="mt-5">
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
