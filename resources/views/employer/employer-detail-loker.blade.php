@extends('layouts.dashboard-employer')

@section('nav-link-employer')
<button class="navbar-toggler text-light bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-light"></span>
</button>
<div class="collapse navbar-collapse w-full d-flex ms-5" id="navbarNav">
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
<div class="text-white">
      @auth
      {{ Auth::user()->name }}
      @endauth
</div>
@endsection

@include('partials.navbar-dashboard-admin')
@section('content-admin')


<div class="container">
      <div class="row mt-5">
            <div class="col">
                  <div class="d-flex gap-2">
                        <div class="fw-semi-bold fs-3 text-dark mb-3">{{$data->nama_pekerjaan}}</div>
                  </div>
                  <div class="card-block">
                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Informasi Loker</h6>
                        <div class="row justify-content-center">
                              <div class="col-sm-6 col-lg-5 ms-3 me-5 border border-2 border-dark bg-white rounded-2 mb-2 p-2">
                                    <p class="m-b-10 f-w-600 fw-bold"><i class="bi bi-card-heading"></i> Bagian</p>
                                    <h6 class=" f-w-400">{{ $data->bagian}}</h6>
                              </div>
                              <div class="col-sm-6 col-lg-5 ms-5 border border-2 border-dark bg-white rounded-2 mb-2 p-2">
                                    <p class="m-b-10 f-w-600 fw-bold"><i class="bi bi-geo-alt"></i> Lokasi</p>
                                    <h6 class=" f-w-400">{{ $data->provinsi}} , {{$data->kota_kabupaten}}
                                    </h6>
                              </div>
                              <div class="col-sm-6 col-lg-5 ms-3 me-5 border border-2 border-dark bg-white rounded-2 p-2">
                                    <p class="m-b-10 f-w-600 fw-bold"><i class="bi bi-envelope"></i> Email</p>
                                    <h6 class=" f-w-400">{{ $data->email}}
                                    </h6>
                              </div>
                              <div class="col-sm-6 col-lg-5 ms-5 border border-2 border-dark bg-white rounded-2 p-2">
                                  <p class="m-b-10 f-w-600 fw-bold"><i class="bi bi-alarm"></i> Waktu Kerja</p>
                                  <h6 class=" f-w-400">{{ $data->waktu}}
                                  </h6>
                              </div>
                              <div class="data-gaji col-sm-6 col-lg-5 border border-2 border-dark bg-white rounded-2 p-2">
                                  <p class="m-b-10 f-w-600 fw-bold"><i class="bi bi-cash-stack"></i> Gaji</p>
                                  <h6 class=" f-w-400">Rp. {{ $data->gaji}}
                                  </h6>
                              </div>
                        </div>
                        <hr>
                        <div class="row card border border-2 border-black">
                              <div class="card-body">
                              <div class="fw-bolder mb-4 text-dark">DESKRIPSI PEKERJAAN</div>
                                    <p class="">
                                          {{$data->deskripsi}}
                                    </p>
                              </div>
                              <hr>
                              <div class="fw-bolder mb-4 text-dark">REQUIREMENT PEKERJAAN</div>
                                    <p class="p-req">
                                          {{$data->requirement}}
                                    </p>
                              </div>
                              </div>
                        </div>
                        {{-- <div class="modal-requirement mb-4">
                              <div class="title-modal-requirement mb-2 fw-bolder">
                                    JOB REQUIREMENT
                              </div>
                              <div class="detail-modal-requirement">
                                    <div>
                                          {!! nl2br(e($data->requirement)) !!}
                                    </div>
                              </div>
                        </div> --}}
                  </div>
            </div>
            <div class="col">
                  <div class="fw-bolder text-secondary fs-4 text-center bg-body-tertiary mb-3">Kandidat</div>
                  <div style="max-height: 400px" class="overflow-auto">
                        @foreach ($showUsers as $item)
                        {{-- <a href="/view/loker-edit/kode-loker/kode-candidat" class="link-underline link-underline-opacity-0"> --}}
                              <a href="" class="link-underline link-underline-opacity-0">
                              <div class="card mb-3">
                                    <div class="card-body">
                                          <div class="d-flex gap-3">
                                                <div>
                                                      <div>
                                                      @if ($showUsers->profile_user->image)
                                                      <a href="" data-bs-toggle="modal" data-bs-target="#detailphoto">
                                                            <img src="{{ asset('storage/photo-user/'.$showUsers->profile_user->image)}}" alt="" class="rounded-3 img-profile-user border border-2">
                                                      </a>
                                                      @else
                                                      @if ($showUsers->profile_user->jk === 'she/her')
                                                      <a href="" data-bs-toggle="modal" data-bs-target="#detailphoto">
                                                            <img src="{{ asset('../../img/person-default-female.jpg')}}" alt="" class="rounded-3 img-profile-user border border-2">
                                                      </a>
                                                      @else
                                                      <a href="" data-bs-toggle="modal" data-bs-target="#detailphoto">
                                                            <img src="{{ asset('../../img/person-default.jpg')}}" alt="" class="rounded-3 img-profile-user border border-2">
                                                      </a>
                                                      @endif
                                                      @endif
                                                        </div>
                                                      <div class="mt-1">
                                                            <div class="d-flex gap-3 align-items-center text-secondary" style="font-size: 14px">
                                                                  <i class="bi bi-envelope"></i>
                                                                  <div>{{ $item->email }}</div>
                                                            </div>
                                                            <div class="d-flex gap-3 align-items-center text-secondary" style="font-size: 14px">
                                                                  <i class="bi bi-telephone"></i>
                                                                  <div>{{ $item->no_telp }}</div>
                                                            </div>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </a>
                        @endforeach
                  </div>
            </div>
      </div>
      @include('partials.footer')
</div>

@endsection
