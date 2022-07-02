@extends('frontend.layouts.layout')
@section('content')

@include('frontend.layouts.navbar')

<header>
  <div class="container d-flex justify-content-between align-items-center p-4">
    <div class="text">
      <h1>Selamat Datang</h1>
      <p>Sekolah Sepak Bola Idol</p>
      <p>Alamat Jl.</p>
    </div>
    <div class="image">
      <img src="https://picsum.photos/600/300" alt="">
    </div>
  </div>
</header>

<section class="mt-5">
  <div class="container d-flex justify-content-evenly align-items-center">
    <div class="img-coach">
      <img src="https://picsum.photos/100/100" alt="" style="border-radius: 50%">
      <p>Nama Pelatih</p>
    </div>
    <div class="text-coach">
      <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit ut neque iusto."</p>
    </div>
  </div>
</section>

<section class="mt-5">
  <div class="container">
    <h1 class="text-center">Visi & Misi</h1>
    <div class="d-flex justify-content-around">
      <div class="visi mt-3">
        <h5 class="text-center">Visi</h5>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur, a.</p>
      </div>
      <div class="misi mt-3">
        <h5 class="text-center">Misi</h5>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur, a.</p>
      </div>
    </div>
  </div>
</section>

<section class="mt-5">
  <div class="container">
    <h1>Prestasi</h1>
    <div class="row">
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body text-center">
            <i class="fa fa-trophy " style="font-size: 250px; color: #fab005"></i>
            <h5 class="card-title">Juara 1 Kecamatan</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body text-center">
            <i class="fa fa-trophy " style="font-size: 250px; color: #fab005"></i>
            <h5 class="card-title">Juara 1 Kecamatan</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body text-center">
            <i class="fa fa-trophy " style="font-size: 250px; color: #fab005"></i>
            <h5 class="card-title">Juara 1 Kecamatan</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <div class="card-body text-center">
            <i class="fa fa-trophy " style="font-size: 250px; color: #fab005"></i>
            <h5 class="card-title">Juara 1 Kecamatan</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="mt-5">
  <div class="container">
    <h1>Artikel</h1>
    <div class="row">
      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card" style="width: 18rem;">
          <img src="https://picsum.photos/200/200" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('frontend.layouts.footer')

@endsection