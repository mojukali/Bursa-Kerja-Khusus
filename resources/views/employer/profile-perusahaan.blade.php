@extends('layouts.app')
@section('content')

<div class="container">
      @include('partials.modal-login-user')
      <div class="row mt-5 pb-5">
      <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
          <div class="col-xl-12 col-md-12">
            <div class="card user-card-full">
                <div class="row m-l-0 m-r-0">
                    <div class="col-sm-4 bg-c-lite-green user-profile">
                        <div class="card-block text-center text-white">
                        <h6 class="fs-3 mb-4">{{$data->name}}</h6>
                            <div class="m-b-25">
                              @if($data->image)
                              <img src="{{ asset('storage/photo-employe/'.$data->image)}}" class="img-radius w-25 h-25" alt="">
                              @else
                              <img src="{{ asset('../../assets/images/building.jpg') }}" class="img-radius w-75 h-75" alt="Default Image">
                              @endif
                            </div>
                            <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                        </div>
                    </div>
                    <div class="col-sm-8 grid">
                        <div class="card-block">
                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                            <div class="row">
                                <div class="col-sm-6 border border-2 border-dark mb-2 p-2">
                                    <p class="m-b-10 f-w-600"><i class="bi bi-envelope"></i> Email</p>
                                    <h6 class="text-muted f-w-400">{{$data->email}}</h6>
                                </div>
                                <div class="col-sm-6 border border-2 border-dark mb-2 p-2">
                                    <p class="m-b-10 f-w-600"><i class="bi bi-telephone"></i> Phone</p>
                                    <h6 class="text-muted f-w-400">{{$data->no_telp}}</h6>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 border border-2 border-dark p-2">
                                    <p class="m-b-10 f-w-600"><i class="bi bi-geo-alt"></i> Lokasi</p>
                                    <h6 class="text-muted f-w-400">{{$data->lokasi}}</h6>
                                </div>
                                <div class="col-sm-6 border border-2 border-dark p-2">
                                    <p class="m-b-10 f-w-600"><i class="bi bi-box-arrow-in-down"></i> Tanggal Bergabung</p>
                                    <h6 class="text-muted f-w-400">Bergabung pada tanggal {{$data->created_at->format('d/m/Y')}}</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="fw-bolder mb-4 text-center text-secondary rounded p-2">TENTANG PERUSAHAAN</div>
                                    <p class="deskripsi-perusahaan">
                                          {{$data->deskripsi}}
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
            <div>
                  <div class="fw-bolder mb-4 mt-5 text-center text-secondary rounded p-2">LOKER PERUSAHAAN</div>
                  <div class="row">
                        @if($data->loker->isEmpty())
                        <div class="d-flex align-items-center justify-content-center">
                              <img src="../../../assets/images/no_data_found2.png" style="width: 260px" alt="">
                        </div>
                        @else
                        @foreach ($data->loker as $item)
                        <div class="col-xl-3 col-md-4 col-sm-12">
                              <div class="card" style="width: 18rem;">
                                    <div class="card-body">
                                       <h5 class="card-title">{{$item->nama_pekerjaan}}</h5>
                                       <p class="card-text">{{$item->nama_perusahaan}}</p>
                                       <p class="card-text text-truncate">{{$item->deskripsi}}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                          <li class="list-group-item">
                                          <li class="list-group-item text-truncate"><i class="bi bi-geo-alt-fill"></i> {{$item->kota_kabupaten}},{{$item->provinsi}}</li>
                                          <li class="list-group-item">
                                          @php
                                          $gajiF = $item->gaji;
                                          @endphp
                                          <i class="bi bi-cash-stack"></i> {{$gaji_terformat = number_format($gajiF, 0, ',', '.')}}</li>
                                          <li class="list-group-item"><i class="bi bi-briefcase-fill"></i> {{$item->bagian}}</li>
                                          <li class="list-group-item"><i class="bi bi-clock-fill"></i> {{$item->waktu}}</li>
                                    </ul>
                                    <div class="btn btn-success rounded-1" href=""
                                          data-bs-toggle="modal"data-bs-target="#exampleModal{{$item->id}}">Klik Disini
                                    </div>
                              </div>
                              @include('partials.modal-loker')
                        </div>
                        @endforeach
                        @endif
                  </div>
            </div>
      </div>
      @include('partials.footer')
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

@endsection
