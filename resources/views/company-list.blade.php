@extends('layouts.app')
@section('content')

@section('nav')

@endsection
@include('partials.modal-login-user')
<div class="container">
      <div class="row mt-5" style="min-height: 400px">
            @if($data->isEmpty())
            <div class="d-flex align-items-center justify-content-center">
                  <div style="width: 400px">
                        @include('svg.ilustration-nodatafound')
                  </div>
            </div>
            @else
            @foreach ($data as $item)
            <div class="col-xl-3 col-md-3 col-sm-12 mb-3">
                  @guest
                  <div class="card" style="width: 18rem;">
                        @if ($item->image)
                        <img class="w-100" src="{{ asset('storage/photo-employe/'.$item->image)}}" alt="">
                        @endif
                        <div class="card-body">
                              <h5 class="card-title text-center text-truncate">{{$item->name}}</h5>
                              <hr class="">
                              <p class="card-text text-truncate">{{$item->deskripsi}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                              <li class="list-group-item"><i class="bi bi-geo-alt-fill"></i> {{$item->lokasi}}</li>
                              <li class="list-group-item"><i class="bi bi-envelope-at-fill"></i> {{$item->email}}</li>
                              <li class="list-group-item"><i class="bi bi-telephone-fill"></i> {{$item->no_telp}}</li>
                        </ul>
                        <div class="card-body align-self-center ">
                              <a href="{{ route('profile-employer',['id'=>$item->id])}}" class="btn btn-primary">Cek Profile -> </a>
                        </div>
                  </div>
                  @else
                  <div class="card" style="width: 18rem;">
                        @if ($item->image)
                        <img class="w-100" src="{{ asset('storage/photo-employe/'.$item->image)}}" alt="">
                        @else
                        <div class="d-flex align-items-center justify-content-center fw-semibold fs-1" style=""><i class="bi bi-building"></i></div>
                        @endif
                        <div class="card-body">
                              <h5 class="card-title text-center text-truncate">{{$item->name}}</h5>
                              <hr>
                              <p class="card-text text-truncate">{{$item->deskripsi}}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                              <li class="list-group-item"><i class="bi bi-geo-alt-fill"></i> {{$item->lokasi}}</li>
                              <li class="list-group-item"><i class="bi bi-envelope-at-fill"></i> {{$item->email}}</li>
                              <li class="list-group-item"><i class="bi bi-telephone-fill"></i> {{$item->no_telp}}</li>
                        </ul>
                        <div class="card-body align-self-center ">
                              <a href="{{ route('profile-employer',['id'=>$item->id])}}" class="btn btn-primary">Cek Profile -> </a>
                        </div>
                  </div>
                  @endguest
            </div>
            @endforeach
            @endif
      </div>
      @include('partials.footer')
</div>

@endsection
