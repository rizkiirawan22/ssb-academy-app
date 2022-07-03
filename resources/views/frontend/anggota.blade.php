@extends('frontend.layouts.layout')
@section('content')

@include('frontend.layouts.navbar')

<section class="mt-5 py-4">
  <div class="container">
    <h1 class="mb-5">Anggota SSB</h1>
    <div class="row">
      @foreach ($members as $member)  
      <div class="col-md-3">
          <div class="card shadow-lg p-2" style="width: 18rem;">
            <img src="{{ asset('storage/'. $member->photo) }}" class="card-img-top" style="max-width: 280px">
            <div class="card-body">
              <h5 class="card-title text-center">{{ $member->name }}</h5>
              <table class="table">
                <thead>
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Jenis Kelamin:</td>
                    <td>{{ $member->gender }}</td>
                  </tr>
                  <tr>
                    <td>Tgl Lahir:</td>
                    <td>{{ $member->date_of_birth }}</td>
                  </tr>
                  <tr>
                    <td>Alamat:</td>
                    <td>{{ $member->address }}</td>
                  </tr>
                  <tr>
                    <td>Email:</td>
                    <td>{{ $member->email }}</td>
                  </tr>
                  <tr>
                    <td>Telepon:</td>
                    <td>{{ $member->phone }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="card-footer bg-primary"></div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

@include('frontend.layouts.footer')

@endsection