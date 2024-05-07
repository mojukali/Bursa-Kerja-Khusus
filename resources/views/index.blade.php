@extends('layouts.app')
@section('content')

@section('nav')
@endsection

<div class="pt-5">
      <div class="container">
            @include('partials.modal-login-user')
            <form class="d-none d-xl-block d-md-block" action="{{ route('user.search') }}" method="GET">
                  <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control py-3 me-3 rounded-2" style="border: 2px solid; border-color: #8CB9BD;" placeholder="Cari Posisi Yang Diinginkan" aria-label="Username" aria-describedby="basic-addon1">
                        <select class="form-select py-3 me-3 rounded-2" style="border: 2px solid; border-color: #8CB9BD;" aria-label="Username" aria-describedby="basic-addon1" name="jurusan" id="klasifikasi">
                              <option selected>Pilih Jurusan</option>
                              @foreach ($jurusan as $item)
                              <option id="myText">
                                    {{$item->jurusan}}
                              </option>
                              @endforeach
                        </select>
                        <select class="form-select py-3 me-3 rounded-2" style="border: 2px solid; border-color: #8CB9BD;" aria-label="Default select example" name="provinsi" aria-describedby="basic-addon1" id="provinsi" onclick="loadProvinsi()">
                        </select>
                        <button class="btn btn-outline-dark px-5 rounded-2 fw-semibold" type="submit" style="color:#8CB9BD; border: 2px solid; border-color: #8CB9BD;">
                              Cari
                        </button>
                  </div>
            </form>
            <div class="row d-flex justify-content-center mt-5">
                  <div class="col-xl-4 col-md-4 col-sm-12">
                     <div class="card card-stats mb-4 mb-xl-0 text-light" style="background-color:#3d216f;">
                      <div class="card-body">
                        <div class="row">
                          <div class="col">
                            <h5 class="card-title text-uppercase mb-0">LOWONGAN PERKERJAAN</h5>
                            <span class="h2 font-weight-bold mb-0">{{$loker}}</span>
                          </div>
                          <div class="col-auto">
                            <div class="">
                             <i class="bi bi-briefcase-fill"></i>
                            </div>
                          </div>
                        </div>
                        <p class=" mb-0 text-sm">
                          <span class="text-nowrap">Since last week</span>
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-4 col-md-4 col-sm-12">
               <div class="card card-stats mb-4 mb-xl-0 text-light" style="background-color:#3d216f;">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase mb-0">Alumni</h5>
                      <span class="h2 font-weight-bold mb-0">{{$user}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="">
                        <i class="bi bi-person-lines-fill" ></i>
                      </div>
                    </div>
                  </div>
                  <p class=" mb-0    text-sm">
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-12">
               <div class="card card-stats mb-4 mb-xl-0 text-light" style="background-color:#3d216f;">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase mb-0">Perusahaan</h5>
                      <span class="h2 font-weight-bold mb-0">{{$employe}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="">
                        <i class="bi bi-buildings-fill" ></i>
                      </div>
                    </div>
                  </div>
                  <p class=" mb-0 text-sm">
                    <span class="text-nowrap">Since last week</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
      </div>
</div>

<div class="container">
      <div class="row mt-5">
            @if($data->isEmpty())
            <div class="d-flex align-items-center justify-content-center">
                  <div style="width: 400px">
                        @include('svg.ilustration-nodatafound')
                  </div>
                  {{-- <img src="../assets/images/no_data_found2.png" style="width: 500px" alt=""> --}}
            </div>
            @else
            {{-- Tampilkan data yang ada --}}
            @foreach ($data as $item)
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
      @include('partials.footer')
</div>
@endsection
