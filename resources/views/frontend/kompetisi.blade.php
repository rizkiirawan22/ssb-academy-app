@extends('frontend.layouts.layout')
@section('content')

@include('frontend.layouts.navbar')

<section class="mt-5">
  <div class="container">
    <h1>Daftar Kompetisi</h1>
    <div class="row">
      @foreach ($competitions as $competition)  
      <div class="card">
          <div class="card-header">
            Kompetisi
          </div>
          <div class="card-body">
            <h5 class="card-title">{{ $competition->name }}</h5>
            <p class="card-text"><i class="fa fa-map-marker"></i> {{ $competition->place }}</p>
            <p><i class="fa fa-calendar"></i> {{ $competition->date }}</p>
            <p>{{ $competition->description }}</p>
          </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@include('frontend.layouts.footer')

@endsection