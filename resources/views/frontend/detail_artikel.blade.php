@extends('frontend.layouts.layout')
@section('content')

@include('frontend.layouts.navbar')

<section class="mt-5 py-4">
  <div class="container">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">{{ $article->title }}</h5>
          <p><i class="fa fa-calendar"></i> {{ $article->date }}</p>
          <img src="{{ asset('sorage/'.$article->image) }}">
          <hr>
          <p class="card-text">{!! $article->content !!}</p>
        </div>
      </div>
</section>

@include('frontend.layouts.footer')

@endsection