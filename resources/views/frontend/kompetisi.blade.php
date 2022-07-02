@extends('frontend.layouts.layout')
@section('content')

@include('frontend.layouts.navbar')

<section class="mt-5">
  <div class="container">
    <h1>Daftar Kompetisi</h1>
    <div class="row">
        <div class="card">
            <div class="card-header">
              Kompetisi
            </div>
            <div class="card-body">
              <h5 class="card-title">Pertandingan Persahabatan</h5>
              <p class="card-text">Lapangan Futsal Tasikmalaya</p>
            </div>
          </div>
    </div>
  </div>
</section>

@include('frontend.layouts.footer')

@endsection