      @extends('layouts.admin')
      @section('content-admin')
      @section('nav')
      <div class="dropdown">
            <a class="dropdown-toggle text-light link-underline link-underline-opacity-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  @auth
                  {{ Auth::user()->name }}
                  @endauth
            </a>
            <ul class="dropdown-menu">
                  <li><a class="dropdown-item text-danger" href="{{ route('user.logout')}}">Log Out</a></li>
            </ul>
      </div>
      @endsection

      @include('partials.navbar-dashboard-admin')
      <div class="d-flex dashboard-content">
            <div class="left w-25 h-100 mt-5">
                  <div class="kiri">
                        @include('partials.sidebar-dashboard-admin')
                  </div>
            </div>
            <div class="kanan w-75 mt-5">
                  <div class="container content-body" style="width: 1000px">

                  <!-- kotakkotak start -->
                  <div class="row d-flex justify-content-center mt-5 mb-5">
                        <div class="col-xl-4 col-md-4 col-sm-12">
                           <div class="card card-stats mb-4 mb-xl-0 text-light" style="background-color:#3d216f;">
                            <div class="card-body">
                              <div class="row">
                                <div class="col">
                                  <h5 class="card-title text-nowrap mb-0">LOWONGAN PERKERJAAN</h5>
                                  <span class="h2 font-weight-bold mb-0">{{$loker}}</span>
                                </div>
                                <div class="col-auto">
                                  <div class="">

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
                  <!-- kotakkotak end -->

                        <div class="tab-content ps-3 pe-3" id="nav-tabContent">
                              <!-- graphic start -->
                              <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                    <div class="row ms-5 ps-3">
                                          <div class="col">
                                                <div style="width: 300px">
                                                      <canvas id="polarArea" width="500" height="200"></canvas>
                                                </div>
                                          </div>
                                          <div class="col">
                                                <div style="width: 300px">
                                                      <canvas id="pieChart" width="500" height="200"></canvas>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <!-- graphic end -->

                              <div class="tab-pane fade" id="list-loker" role="tabpanel" aria-labelledby="list-loker-list">
                                    <div class="pe-5">
                                          <table class="table table-striped border" style="width: 950px;">
                                                <thead>
                                                      <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nama Perusahaan</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Lokasi</th>
                                                            <th scope="col">No Telephone</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @foreach ($employE as $item)
                                                      <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->email}}</td>
                                                            <td>{{$item->lokasi}}</td>
                                                            <td>{{$item->no_telp}}</td>
                                                            <td>
                                                                  {{$roles = $item->getRoleNames()->join(', ');}}
                                                            </td>
                                                            <td>
                                                                  <div class="dropdown">
                                                                        <a class="dropdown-toggle link-underline link-underline-opacity-0 text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                              Option
                                                                        </a>
                                                                        <ul class="dropdown-menu">
                                                                              <li><a class="dropdown-item d-flex gap-3" href="{{ route('user.profile-employe', ['id' =>$item->id])}}"><i class="bi bi-eye"></i>Show</a></li>
                                                                              <li><a class="dropdown-item d-flex gap-3" href="{{ route('user.edit-role', ['id' =>$item->id])}}"><i class="bi bi-pencil"></i>Edit Role</a></li>
                                                                              <li>
                                                                                    <form action="{{ route('user.delete-employe',['id' => $item->id]) }}" method="POST">
                                                                                          @csrf
                                                                                          @method('DELETE')
                                                                                          <button type="submit" class="dropdown-item d-flex gap-3"><i class="bi bi-trash"></i> Hapus</button>
                                                                                    </form>
                                                                              </li>
                                                                        </ul>
                                                                  </div>
                                                            </td>
                                                      </tr>
                                                      @endforeach
                                                </tbody>
                                          </table>
                                    </div>
                              </div>
                              <div class="tab-pane fade" id="list-verif" role="tabpanel" aria-labelledby="list-loker-list">
                                    <div class="pe-5">
                                          <table class="table table-striped border" style="width: 950px;">
                                                <thead>
                                                      <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nama Perusahaan</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Lokasi</th>
                                                            <th scope="col">No Telephone</th>
                                                            <th scope="col">Status</th>
                                                            <th scope="col">Action</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @foreach ($dataE as $item)
                                                      <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>{{$item->email}}</td>
                                                            <td>{{$item->lokasi}}</td>
                                                            <td>{{$item->no_telp}}</td>
                                                            <td>
                                                                  {{$roles = $item->getRoleNames()->join(', ');}}
                                                            </td>
                                                            <td>
                                                                  <div class="dropdown">
                                                                        <a class="dropdown-toggle link-underline link-underline-opacity-0 text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                              Option
                                                                        </a>
                                                                        <ul class="dropdown-menu">
                                                                              <li><a class="dropdown-item d-flex gap-3" href="{{ route('user.profile-employe', ['id' =>$item->id])}}"><i class="bi bi-eye"></i>Show</a></li>
                                                                              <li><a class="dropdown-item d-flex gap-3" href="{{ route('user.edit-role', ['id' =>$item->id])}}"><i class="bi bi-pencil"></i>Edit Role</a></li>
                                                                              <li>
                                                                                    <form action="{{ route('user.delete-employe',['id' => $item->id]) }}" method="POST">
                                                                                          @csrf
                                                                                          @method('DELETE')
                                                                                          <button type="submit" class="dropdown-item d-flex gap-3"><i class="bi bi-trash"></i> Hapus</button>
                                                                                    </form>
                                                                              </li>
                                                                        </ul>
                                                                  </div>
                                                            </td>
                                                      </tr>
                                                      @endforeach
                                                </tbody>
                                          </table>
                                    </div>
                              </div>
                              <div class="tab-pane fade" id="list-apply" role="tabpanel" aria-labelledby="list-loker-list">
                                    <div class="pe-5">
                                          <table class="table table-striped border" style="width: 950px;">
                                                <thead>
                                                      <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">NISN</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Action</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @foreach ($dataU as $item)
                                                      <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$item->nisn}}</td>
                                                            <td>{{$item->name}}</td>
                                                            <td>
                                                                  <div class="dropdown">
                                                                        <a class="dropdown-toggle link-underline link-underline-opacity-0 text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                              Option
                                                                        </a>
                                                                        <ul class="dropdown-menu">
                                                                              <li><a class="dropdown-item d-flex gap-3" href="{{ route('user.user-profile', ['id' =>$item->id])}}"><i class="bi bi-eye"></i>Show</a></li>
                                                                              <li>
                                                                                    <form action="{{ route('user.delete',['id' => $item->id]) }}" method="POST">
                                                                                          @csrf
                                                                                          @method('DELETE')
                                                                                          <button type="submit" class="dropdown-item d-flex gap-3"><i class="bi bi-trash"></i> Hapus</button>
                                                                                    </form>
                                                                              </li>
                                                                        </ul>
                                                                  </div>
                                                            </td>
                                                      </tr>
                                                      @endforeach
                                                </tbody>
                                          </table>
                                    </div>
                              </div>
                              <div class="tab-pane fade" id="list-candidat" role="tabpanel" aria-labelledby="list-loker-list">
                                    <div class="pe-5">
                                          <table class="table table-striped border" style="width: 950px;">
                                                <thead>
                                                      <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Nama Pekerjaan</th>
                                                            <th scope="col">Lokasi</th>
                                                            <th scope="col">Waktu</th>
                                                            <th scope="col">Gaji</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Batas Waktu</th>
                                                            <th scope="col">Action</th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @foreach ($data as $item)
                                                      <tr>
                                                            <td>{{$loop->iteration}}</td>
                                                            <td>{{$item->nama_pekerjaan}}</td>
                                                            <td>{{$item->provinsi}},{{$item->kota_kabupaten}}</td>
                                                            <td>{{$item->waktu}}</td>
                                                            <td>{{$item->gaji}}</td>
                                                            <td>{{$item->email}}</td>
                                                            <td>{{$item->expired}}</td>
                                                            <td>
                                                                  <div class="dropdown">
                                                                        <a class="dropdown-toggle link-underline link-underline-opacity-0 text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                              Option
                                                                        </a>
                                                                        <ul class="dropdown-menu">
                                                                              <li>
                                                                                    <a class="dropdown-item d-flex gap-3" href="{{ route('user.detail-loker', ['id' =>$item->id])}}"><i class="bi bi-eye"></i>Show</a>
                                                                                    <form action="{{ route('user.delete-loker',['id' => $item->id]) }}" method="POST">
                                                                                          @csrf
                                                                                          @method('DELETE')
                                                                                          <button type="submit" class="dropdown-item d-flex gap-3"><i class="bi bi-trash"></i> Hapus</button>
                                                                                    </form>
                                                                              </li>
                                                                        </ul>
                                                                  </div>
                                                            </td>
                                                      </tr>
                                                      @endforeach
                                                </tbody>
                                          </table>
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
      </div>
      @endsection
