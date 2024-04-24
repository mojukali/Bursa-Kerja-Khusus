@extends('layouts.dashboard-employer')

@section('nav-link-employer')
<button class="navbar-toggler text-light bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-light"></span>
</button>
<div class="collapse navbar-collapse w-full d-flex ms-5     " id="navbarNav">
      <ul class="navbar-nav d-flex gap-3">
            <li class="nav-item">
                  <a class="nav-link active text-light" aria-current="page" href="{{ route('employe.employe')}}">HOME</a>
            </li>
            <li class="nav-item">
                  <a class="nav-link active text-light" aria-current="page" href="{{ route('employe.dashboard-employe')}}">DASHBOARD</a>
            </li>
      </ul>
</div>
@endsection

@section('nav')
<div class="dropdown">
      <a class="dropdown-toggle text-light link-underline link-underline-opacity-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            @auth
            {{ Auth::user()->name }}
            @endauth
      </a>

      <ul class="dropdown-menu">
            <li><a class="dropdown-item text-dark menu-sidebar" href="/employe/edit-profile">Profile</a></li>
            <li><a class="dropdown-item text-danger menu-sidebar" href="{{ route('employe-logout')}}">Logout</a></li>
      </ul>
</div>
@endsection

@section('content-admin')

@include('partials.navbar-dashboard-admin')

<div class="container">
      <div class="row m-l-0 m-r-0">
            <!-- INFORMATION -->
            <div class="col-6 grid">
                <div class="card-block">
                    <h3 class="text-center fw-bold">{{$dataE->name}}</h3>
                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                    <div class="row">
                        <div class="col-sm-6 border border-2 border-dark mb-2 p-2">
                            <p class="m-b-10 f-w-600"><i class="bi bi-envelope"></i> Email</p>
                            <h6 class="text-muted f-w-400">{{$dataE->email}}</h6>
                        </div>
                        <div class="col-sm-6 border border-2 border-dark mb-2 p-2">
                            <p class="m-b-10 f-w-600"><i class="bi bi-telephone"></i> Phone</p>
                            <h6 class="text-muted f-w-400">{{$dataE->no_telp}}</h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 border border-2 border-dark p-2">
                            <p class="m-b-10 f-w-600"><i class="bi bi-geo-alt"></i> Lokasi</p>
                            <h6 class="text-muted f-w-400">{{$dataE->lokasi}}</h6>
                        </div>
                        <div class="col-sm-6 border border-2 border-dark p-2">
                            <p class="m-b-10 f-w-600"><i class="bi bi-box-arrow-in-down"></i> Tanggal Bergabung</p>
                            <h6 class="text-muted f-w-400">Bergabung pada tanggal {{$dataE->created_at->format('d/m/Y')}}</h6>
                        </div>
                    </div>
                    <div class="row mb-3 mt-2 ">
                        <div class="col d-flex justify-content-center">
                              <div>
                                    <a class="btn btn-dark px-5 fw-semibold" href="{{ route('employe.new-loker', ['id' => $dataE->id]) }}" style="font-size: 12px" role="button">BUAT LOKER</a>
                              </div>
                        </div>
                  </div>
                    <hr>
                    <div class="row">
                    <div class="fw-bolder mb-4 text-center text-secondary rounded p-2">TENTANG PERUSAHAAN</div>
                            <p class="deskripsi-perusahaan">
                                  {{$dataE->deskripsi}}
                            </p>
                    </div>
                </div>
            </div>

            <!-- LOKER -->
         <div class="col-6 mt-3 mb-3">
            <h3 class="text-center fw-bold mt-1 mb-5">LOKER TERSEDIA</h3>
            <div class="row">
                  <div class="col">
                        @foreach ($dataE->loker as $item)
                        <div class="card w-full border border-2" style="font-size: 14px">
                              <div class="card-body">
                                    <div class="row">
                                          <div class="col-9">
                                                <div class="fw-bolder">{{$item->nama_pekerjaan}}
                                                </div>
                                          </div>
                                          <div class="col">
                                                <div class="text-end text-primary text-end fw-bolder">{{$item->status}}</div>
                                          </div>
                                    </div>
                                    <div class="text-secondary mt-2">{{$item->bagian}}</div>
                              </div>
                              <div class="card-footer text-center text-secondary">
                              <a href="{{ route('employe.detail-loker', ['id' =>$item->id])}}" class="btn btn-success text-white fw-bold link-offset-2 link-underline link-underline-opacity-0 link-underline-opacity-100-hover link-dark">Klik Disini</a>
                              </div>
                        </div>
                        @endforeach
                  </div>
            </div>
         </div>    
      </div>
      @include('partials.footer')
</div>
@if($message = Session::get('new_account'))
<script>
      Swal.fire({
            icon: "info"
            , title: "{{$message}}"
            , text: "Perusahaan anda sedang dalam verifikasi"
            , footer: "Tunggu beberapa saat"
      });

</script>
@endif
@endsection
