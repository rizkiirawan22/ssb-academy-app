@extends('frontend.layouts.layout')
@section('content')

@include('frontend.layouts.navbar')

<section class="mt-5">
  <div class="container">
    <h1>Anggota SSB</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card" style="width: 18rem;">
              <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Nama Anggota</h5>
                <p class="card-text">alamat: alamat</p>
              </div>
            </div>
          </div>

      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Nama Anggota</h5>
            <p class="card-text">alamat: alamat</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Nama Anggota</h5>
            <p class="card-text">alamat: alamat</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Nama Anggota</h5>
            <p class="card-text">alamat: alamat</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('frontend.layouts.footer')

@endsection