@extends('frontend.layouts.layout')
@section('content')

@include('frontend.layouts.navbar')

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