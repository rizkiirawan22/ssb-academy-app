@extends('frontend.layouts.layout')
@section('content')

@include('frontend.layouts.navbar')

<section class="mt-5">
  <div class="container">
    <div class="card">
        <div class="card-body">
          <h5 class="card-title">Judul Artikel</h5>
          <p>tanggal</p>
          <img src="https://picsum.photos/600/300">
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        </div>
      </div>
</section>

@include('frontend.layouts.footer')

@endsection