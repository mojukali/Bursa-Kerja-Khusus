@extends('layouts.app')
@section('content')
<body class="bg-body-secondary">
      <div class="container pt-5">
            <div class="row">
                  <!-- kiri -->
                  <div class="row m-l-0 m-r-0">
                    <div class="col-sm-4 bg-white user-profile">
                        <div class="card-block text-center text-dark">
                        <h6 class="fs-3 mb-4">{{$dataU->name}}<div class="fw-light text-dark" style="font-size: 12px">({{$dataU->profile_user->jk}})</div></h6>
                            <div class="m-b-25">
                              @if ($dataU->profile_user->image)
                              <a href="" data-bs-toggle="modal" data-bs-target="#detailphoto">
                                    <img src="{{ asset('storage/photo-user/'.$dataU->profile_user->image)}}" alt="" class="rounded-circle img-profile-user border border-2">
                              </a>
                              @else
                              @if ($dataU->profile_user->jk === 'she/her')
                              <a href="" data-bs-toggle="modal" data-bs-target="#detailphoto">
                                    <img src="{{ asset('../../img/person-default-female.jpg')}}" alt="" class="rounded-circle img-profile-user border border-2">
                              </a>
                              @else
                              <a href="" data-bs-toggle="modal" data-bs-target="#detailphoto">
                                    <img src="{{ asset('../../img/person-default.jpg')}}" alt="" class="rounded-circle img-profile-user border border-2">
                              </a>
                              @endif
                              @endif
                              <div class="small font-italic mb-4 mt-2">Use an JPG or PNG with a ratio of 1x1.</div>
                              <button class="btn btn-primary mb-0 mt-3" data-bs-toggle="modal" data-bs-target="#photo" type="button">Upload New Image</button>
                              <div class="modal fade" id="photo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                          <form action="{{route('user.photo-profile',['id' =>$dataU->id])}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                      <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Photo Profile</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                            <div class="mb-3">
                                                                  <input class="form-control" name="photo" type="file" id="formFile">
                                                            </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary rounded-pill">Save changes</button>
                                                      </div>
                                                </div>
                                          </form>
                                    </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8 grid">
                        <div class="card-block">
                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Personal Information</h6>
                            <div class="row">
                                <div class="col-sm-6 col-lg-5 ms-3 me-5 bg-white rounded-2 mb-2 p-2">
                                    <p class="m-b-10 f-w-600"><i class="bi bi-card-heading"></i> NISN</p>
                                    <h6 class="text-muted f-w-400">{{$dataU->nisn}}</h6>
                                </div>
                                <div class="col-sm-6 col-lg-5 ms-5 bg-white rounded-2 mb-2 p-2">
                                    <p class="m-b-10 f-w-600"><i class="bi bi-telephone"></i> Phone</p>
                                    <h6 class="text-muted f-w-400">{{$dataU->profile_user->no_telp}}
                                          @if ($user = 'user')
                                          <a href="" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" class="ms-auto"><i class="bi bi-pen text-secondary"></i></a>
                                          @endif
                                    </h6>
                                </div>
                            </div>
                              <div class="row">
                                    <div class="col-sm-6 col-lg-5 ms-3 me-5 bg-white rounded-2 p-2">
                                    <p class="m-b-10 f-w-600"><i class="bi bi-geo-alt"></i> Lokasi</p>
                                    <h6 class="text-muted f-w-400">{{$dataU->profile_user->kota}},{{$dataU->profile_user->provinsi}}
                                          @if($user = 'user')
                                          <a href="" data-bs-toggle="modal" data-bs-target="#provinsiUser"><i class="bi bi-pen text-secondary"></i></a>
                                          @endif
                                    </h6>
                                    <div class="modal fade" id="provinsiUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                                <form action="{{ route('user.update-provinsi', ['id' => $dataU->id])}}" method="POST">
                                                      @csrf
                                                      @method('PUT')
                                                      <div class="modal-content">
                                                            <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <div class="d-flex gap-3">
                                                                        <select class="form-select py-3" aria-label="Default select example" id="provinsi" name="provinsi" onclick="loadProvinsi()">
                                                                              <option value="">Pilih Provinsi Anda</option>
                                                                        </select>
                                                                  </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <div class="d-flex gap-3">
                                                                        <select class="form-select py-3" aria-label="Default select example" id="kota_kabupaten" name="kota" onclick="loadKotaKabupaten()">
                                                                              <option value="">Pilih Provinsi Terlebih Dahulu</option>
                                                                        </select>
                                                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                              </div>
                              <div class="col-sm-6 col-lg-5 ms-5 bg-white rounded-2 p-2">
                                  <p class="m-b-10 f-w-600"><i class="bi bi-box-arrow-in-down"></i> Email</p>
                                  <h6 class="text-muted f-w-400">{{$dataU->profile_user->email}}
                                          @if ($user = 'user')
                                          <a href="" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" class="ms-auto"><i class="bi bi-pen text-secondary"></i></a>
                                          @endif
                                  </h6>
                                    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
                                          <div class="modal-dialog">
                                                <form action="{{ route('user.update-contact', ['id' => $dataU->id])}}" method="POST">
                                                      @csrf
                                                      @method('PUT')
                                                      <div class="modal-content">
                                                            <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Edit info contact</h1>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body px-4">
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="{{$dataU->profile_user->email}}">
                                                                  </div>
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput2" class="form-label">No Telp</label>
                                                                        <input type="text" name="no_telp" class="form-control" id="exampleFormControlInput2" value="{{$dataU->profile_user->no_telp}}">
                                                                  </div>
                                                            </div>
                                                            <div class="modal-footer d-flex gap-2" style="font-size: 12px">
                                                                  <button class="btn btn-outline-secondary rounded-pill" data-bs-target="#contact" data-bs-toggle="modal">Cancel</button>
                                                                  <button class="btn btn-primary rounded-pill px-4" type="submit">Save</button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                              </div>
                        </div>
                        <div class="overflow-auto mt-4" style="max-height: 284px">
                        {{-- ABOUT --}}
                        <div class="card bg-white mb-3">
                              <div class="card-body pt-4 ps-4">
                                    <div class="d-flex gap-3">
                                          <div class="fw-semibold mb-3">About</div>
                                          <div><a href="" data-bs-toggle="modal" data-bs-target="#about"><i class="bi bi-pen text-secondary"></i></a></div>
                                    </div>
                                    <div class="modal fade" id="about" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                <form action="{{ route('user.update-about',['id' => $dataU->id])}}" method="POST">
                                                      @csrf
                                                      @method('PUT')
                                                      <div class="modal-content">
                                                            <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">About</h1>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <textarea class="form-control" name="about" id="exampleFormControlTextarea1" rows="20">{{$dataU->profile_user->about}}</textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                                    <div style="font-size: 13px">
                                          <p>{!! nl2br(e($dataU->profile_user->about)) !!}</p>
                                    </div>
                              </div>
                        </div>
                        {{-- EDUCATION --}}
                        <div class="card bg-white mb-3">
                              <div class="card-body pt-4 ps-4">
                                    <div class="d-flex gap-2 mb-3 align-items-center">
                                          <div class="fw-semibold">Education</div>
                                          <div><a href="" class="profile-action-button" data-bs-toggle="modal" data-bs-target="#education" style="font-size: 18px"><i class="bi bi-plus-lg text-dark"></i></a></div>
                                    </div>
                                    <div class="modal fade" id="education" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                                <form action="{{ route('user.add-education' , ['id' => $dataU->id])}}" method="POST">
                                                      @csrf
                                                      <div class="modal-content">
                                                            <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Education</h1>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <input type="hidden" name="user_id" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$dataU->id}}">
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nama sekolah atau universitas</label>
                                                                        <input type="text" name="nama_sekolah" class="form-control" id="exampleFormControlInput1" placeholder="">
                                                                  </div>
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
                                                                        <input type="text" name="jurusan" class="form-control" id="exampleFormControlInput1" placeholder="">
                                                                  </div>
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Tahun Ajaran</label>
                                                                        <input type="text" name="tahun" class="form-control" id="exampleFormControlInput1" placeholder="">
                                                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                                    @foreach ($dataU->education as $item)
                                    <div class="mb-2">
                                          <div class="d-flex align-items-center gap-2">
                                                <div class="fw-semibold" style="font-size: 14px">{{$item->nama_sekolah}}</div>
                                                <a href="" class="profile-action-button ms-auto" data-bs-toggle="modal" data-bs-target="#editEducation{{$item->id}}"><i class="bi bi-pen text-dark"></i></a>
                                                <form action="{{ route('user.delete-education',['id' => $item->id])}}" method="POST">
                                                      @csrf
                                                      @method("DELETE")
                                                      <button class="text-danger bg-transparent border-0" type="submit" class=""><i class="bi bi-trash"></i></button>
                                                </form>
                                          </div>
                                          <div class="fw-normal text-secondary" style="font-size: 14px">{{$item->jurusan}}</div>
                                          <div class="fw-light text-secondary" style="font-size: 12px">{{$item->tahun}}</div>
                                    </div>
                                    <div class="modal fade" id="editEducation{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                                <div class="modal-content">
                                                      <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Education</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                            <input type="text" value="{{$dataU->id}}" hidden>
                                                            <input type="hidden" name="user_id" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$dataU->id}}">
                                                            <div class="mb-3">
                                                                  <label for="exampleFormControlInput1" class="form-label">Nama sekolah atau universitas</label>
                                                                  <input type="text" name="nama_sekolah" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$item->nama_sekolah}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                  <label for="exampleFormControlInput1" class="form-label">Jurusan</label>
                                                                  <input type="text" name="jurusan" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$item->jurusan}}">
                                                            </div>
                                                            <div class="mb-3">
                                                                  <label for="exampleFormControlInput1" class="form-label">Tahun Ajaran</label>
                                                                  <input type="text" name="tahun" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$item->tahun}}">
                                                            </div>
                                                      </div>
                                                      <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                                    @endforeach
                              </div>
                        </div>
                        {{-- EXPERIENCE --}}
                        <div class="card bg-white mb-3">
                              <div class="card-body pt-4 ps-4">
                                    <div class="d-flex gap-2 mb-3 align-items-center">
                                          <div class="fw-semibold">Experience</div>
                                          <div><a href="" class="profile-action-button" data-bs-toggle="modal" data-bs-target="#experience" style="font-size: 18px"><i class="bi bi-plus-lg text-dark"></i></a></div>
                                    </div>
                                    <div class="modal fade" id="experience" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-scrollable">
                                                <form action="{{ route('user.add-experience',['id' => $dataU->id])}}" method="POST">
                                                      @csrf
                                                      <div class="modal-content">
                                                            <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Experience</h1>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <input type="hidden" name="user_id" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$dataU->id}}">
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nama Perusahaan</label>
                                                                        <input type="text" name="nama_perusahaan" class="form-control" id="exampleFormControlInput1" placeholder="Software Host">
                                                                  </div>
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nama Pekerjaan</label>
                                                                        <input type="text" name="nama_pekerjaan" class="form-control" id="exampleFormControlInput1" placeholder="Developer">
                                                                  </div>
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                                                                        <input type="text" name="status" class="form-control" id="exampleFormControlInput1" placeholder="contract">
                                                                  </div>
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Lama Bekerja</label>
                                                                        <input type="text" name="lama_bekerja" class="form-control" id="exampleFormControlInput1" placeholder="2020-2021">
                                                                  </div>
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                                                        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="4"></textarea>
                                                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                                    @foreach ($dataU->experiences as $exp)
                                    <div class="mb-3">
                                          <div class="d-flex gap-2 align-items-center">
                                                <div class="fw-semibold" style="font-size: 14px">{{$exp->nama_perusahaan}}</div>
                                                <a href="" class="text-secondary profile-action-button" data-bs-toggle="modal" data-bs-target="#editExperience{{$exp->id}}"><i class="bi bi-pen"></i></a>
                                                <form action="{{ route('user.delete-experience', ['id' => $exp->id]) }}" method="POST">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button class="text-danger bg-transparent border-0" type="submit" class=""><i class="bi bi-trash"></i></button>
                                                </form>
                                          </div>
                                          <div class="d-flex gap-2 align-items-center">
                                                <div class="fw-normal text-secondary" style="font-size: 14px">{{$exp->nama_pekerjaan}}</div>
                                                <div class="fw-light text-secondary" style="font-size: 12px">{{$exp->status}}</div>
                                          </div>
                                          <div class="fw-light text-secondary" style="font-size: 12px">{{$exp->lama_bekerja}}</div>
                                          <div class="fw-light text-secondary mt-3" style="font-size: 12px">{{$exp->deskripsi}}</div>
                                    </div>
                                    <div class="modal fade" id="editExperience{{$exp->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                                <form action="{{ route('user.update-experience',['id' => $exp->id])}}" method="POST">
                                                      @csrf
                                                      @method('PUT')
                                                      <div class="modal-content">
                                                            <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Experience</h1>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <input type="hidden" name="user_id" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$dataU->id}}">
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nama Perusahaan</label>
                                                                        <input type="text" name="nama_perusahaan" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$exp->nama_perusahaan}}">
                                                                  </div>
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Nama Pekerjaan</label>
                                                                        <input type="text" name="nama_pekerjaan" class="form-control" id="exampleFormControlInput1" placeholder="contract" value="{{$exp->nama_pekerjaan}}">
                                                                  </div>
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Status</label>
                                                                        <input type="text" name="status" class="form-control" id="exampleFormControlInput1" placeholder="contract" value="{{$exp->status}}">
                                                                  </div>
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Lama Bekerja</label>
                                                                        <input type="text" name="lama_bekerja" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$exp->lama_bekerja}}">
                                                                  </div>
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                                                                        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="4">{{$exp->deskripsi}}</textarea>
                                                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                                    @endforeach
                              </div>
                        </div>
                        {{-- SOFT SKILL --}}
                        <div class="card bg-white mb-3">
                              <div class="card-body pt-4 ps-4">
                                    <div class="d-flex gap-2 mb-3 align-items-center">
                                          <div class="fw-semibold">Soft Skill</div>
                                          <div><a href="" class="profile-action-button" data-bs-toggle="modal" data-bs-target="#softskill" style="font-size: 18px"><i class="bi bi-plus-lg text-dark"></i></a></div>
                                    </div>
                                    <div class="modal fade" id="softskill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                                <form action="{{ route('user.add-softskill' ,['id' => $dataU->id ])}}" method="POST">
                                                      @csrf
                                                      <div class="modal-content">
                                                            <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Softskill</h1>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <input type="hidden" name="user_id" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$dataU->id}}">
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Softskill</label>
                                                                        <input type="text" name="skill" class="form-control" id="exampleFormControlInput1" placeholder="">
                                                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                                    @foreach ($dataU->softskill as $item)
                                    <div class="mb-2 pb-2 border-bottom">
                                          <div class="d-flex gap-2 align-items-center">
                                                <div class="fw-semibold" style="font-size: 14px">{{$item->skill}}</div>
                                                <div class="ms-auto gap-2 align-items-center d-flex">
                                                      <a href="" class="text-secondary profile-action-button" data-bs-toggle="modal" data-bs-target="#editSoftskill{{$item->id}}"><i class="bi bi-pen"></i></a>
                                                      <form action="{{ route('user.delete-softskill',['id' => $item->id])}}" method="POST">
                                                            @csrf
                                                            @method("DELETE")
                                                            <button class="text-danger bg-transparent border-0" type="submit" class=""><i class="bi bi-trash"></i></button>
                                                      </form>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="modal fade" id="editSoftskill{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                                <form action="{{ route('user.update-softskill',['id' => $item->id])}}" method="POST">
                                                      @csrf
                                                      @method('PUT')
                                                      <div class="modal-content">
                                                            <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Softskill</h1>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <input type="hidden" name="user_id" class="form-control" id="exampleFormControlInput1" placeholder="" value="">
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Soft SKill</label>
                                                                        <input type="text" name="skill" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$item->skill}}">
                                                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                                    @endforeach
                              </div>
                        </div>
                        {{-- HARD SKILL --}}
                        <div class="card bg-white mb-3">
                              <div class="card-body pt-4 ps-4">
                                    <div class="d-flex gap-2 mb-3 align-items-center">
                                          <div class="fw-semibold">Hard Skill</div>
                                          <div><a href="" class="profile-action-button" data-bs-toggle="modal" data-bs-target="#hardskill" style="font-size: 18px"><i class="bi bi-plus-lg text-dark"></i></a></div>
                                    </div>
                                    <div class="modal fade" id="hardskill" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                                <form action="{{ route('user.add-hardskill' ,['id' => $dataU->id ])}}" method="POST">
                                                      @csrf
                                                      <div class="modal-content">
                                                            <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Add Hardskill</h1>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <input type="hidden" name="user_id" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$dataU->id}}">
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Hardskill</label>
                                                                        <input type="text" name="skill" class="form-control" id="exampleFormControlInput1" placeholder="">
                                                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                                    @foreach ($dataU->hardskill as $item)
                                    <div class="mb-2 pb-2 border-bottom">
                                          <div class="d-flex gap-2 align-items-center">
                                                <div class="fw-semibold" style="font-size: 14px">{{$item->skill}}</div>
                                                <div class="ms-auto gap-2 align-items-center d-flex">
                                                      <a href="" class="profile-action-button text-secondary" data-bs-toggle="modal" data-bs-target="#editHardskill{{$item->id}}"><i class="bi bi-pen"></i></a>
                                                      <form action="{{ route('user.delete-hardskill',['id' => $item->id])}}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="text-danger bg-transparent border-0 profile-action-button" type="submit" class=""><i class="bi bi-trash"></i></button>
                                                      </form>
                                                </div>
                                          </div>
                                    </div>
                                    <div class="modal fade" id="editHardskill{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                                <form action="{{ route('user.update-hardskill' ,['id' => $item->id ])}}" method="POST">
                                                      @csrf
                                                      @method('PUT')
                                                      <div class="modal-content">
                                                            <div class="modal-header">
                                                                  <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Hardskill</h1>
                                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                  <input type="hidden" name="user_id" class="form-control" id="exampleFormControlInput1" placeholder="" value="">
                                                                  <div class="mb-3">
                                                                        <label for="exampleFormControlInput1" class="form-label">Hard SKill</label>
                                                                        <input type="text" name="skill" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{$item->skill}}">
                                                                  </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                      </div>
                                                </form>
                                          </div>
                                    </div>
                                    @endforeach
                              </div>
                        </div>
                        </div>
                    </div>
                  </div>

                  <!-- kanan -->
                  <hr class="mt-5">
                  <div class="row mt-5 mb-5 justify-content-center">
                  <div class="col-xl-4 col-md-12 col-sm-12">
                        <div>
                              <div class="accordion w-100" id="accordionExample">
                                    <div class="accordion-item">
                                          <h2 class="accordion-header">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                      History Apply
                                                </button>
                                          </h2>
                                          <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                                                <div class="accordion-body w-100 overflow-auto"  style="max-height: 550px">
                                                      @if ($history->isEmpty())
                                                      @include('svg.ilustration-history')
                                                      @else
                                                      <div class="d-flex gap-2 align-items-center justify-content-center mb-3">
                                                            <div class="d-flex gap-2 align-items-center">
                                                                  <div class="bg-success p-2 rounded-circle"></div>
                                                                  <div>Diterima</div>
                                                            </div>
                                                            <div class="d-flex gap-2 align-items-center">
                                                                  <div class="bg-danger p-2 rounded-circle"></div>
                                                                  <div>Ditolak</div>
                                                            </div>
                                                            <div class="d-flex gap-2 align-items-center">
                                                                  <div class="bg-secondary p-2 rounded-circle"></div>
                                                                  <div>Menunggu</div>
                                                            </div>
                                                      </div>
                                                      @foreach ($history as $item)
                                                            <a href="{{route('user.user-apply',['id' => $item->id])}}" class="w-100 link-dark link-offset-1 link-underline link-underline-opacity-0">
                                                                  <div class="card-history rounded pt-1 border-bottom">
                                                                        <div class="p-2">
                                                                              <div class="d-flex gap-3">
                                                                                    <div class="d-flex justify-content-center align-items-center">
                                                                                          @if ($item->image)
                                                                                          <div style="width: 40px; height:40px;"><img src="{{ asset('storage/photo-employe/'.$item->image)}}" style="width: 50px" alt=""></div>
                                                                                          @else
                                                                                          <div class="d-flex align-items-center justify-content-center bg-body-tertiary rounded border" style="width: 40px; height:40px;"><div class="fw-bold text-secondary">{{ $firstChar = str($item->nama_perusahaan)->substr(0, 1); }}</div></div>
                                                                                          @endif
                                                                                    </div>
                                                                                    <div class="w-100">
                                                                                          <div class="d-flex align-items-center gap-2" style="font-size: 14px">
                                                                                                @if ($item->status === '2')
                                                                                                <div class="bg-success p-2 rounded-circle"></div>
                                                                                                @elseif($item->status === '1')
                                                                                                <div class="bg-danger p-2 rounded-circle"></div>
                                                                                                @else
                                                                                                <div class="bg-secondary p-2 rounded-circle"></div>
                                                                                                @endif
                                                                                                <div class="fw-medium">{{$item->nama_loker}}</div>
                                                                                                <div class="ms-auto positon-absolute">
                                                                                                      <form action="{{route('user.delete-apply',['id' => $item->apply_id])}}" method="POST">
                                                                                                            @csrf
                                                                                                            @method('DELETE')
                                                                                                            <button class="btn btn-cancel-apply z-4 positon-absolute text-danger" type="submit" style="font-size: 12px;">Batalkan</button>
                                                                                                      </form>
                                                                                                </div>
                                                                                          </div>
                                                                                          <div style="font-size: 12px">{{$item->nama_perusahaan}}</div>
                                                                                    </div>
                                                                              </div>
                                                                              <div class="text-secondary fw-light text-end" style="font-size: 10px">{{ \Carbon\Carbon::parse($item->waktu)->format('d/m/Y') }}</div>
                                                                        </div>
                                                                  </div>
                                                            </a>
                                                      @endforeach
                                                      @endif
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>
                  </div>
                  </div>
            </div>
            <div id="copy-feedback">No telephone berhasil disalin!</div>
            <div id="copy-feedback-email">Email berhasil disalin!</div>
      </div>
      <div class="modal fade" id="detailphoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered d-flex justify-content-center align-items-center">
                  <div class="d-flex justify-content-center align-items-center">
                        <div class="d-flex">
                              @if ($dataU->profile_user->image)
                              <img src="{{ asset('storage/photo-user/'.$dataU->profile_user->image)}}" alt="" class="rounded-pill ratio ratio-1x1 img-profile-user" style="width: 300px; height:300px;">
                              <div class="d-flex align-items-end z-3">
                                    <div class="d-flex align-items-center justify-content-center bg-danger rounded-pill" style="margin-left: -4.3rem; margin-bottom: 10px;">
                                          <div class="d-flex align-items-center justify-content-center m-1 border bg-danger rounded-pill" style="width: 35px; height: 35px;">
                                                <button id="submitBtn" type="submit" class="text-white z-4" style="font-size: 20px;"><i class="bi bi-trash3"></i></button>
                                          </div>
                                    </div>
                              </div>
                              @else
                              @if ($dataU->profile_user->jk === 'she/her')
                              <img src="{{ asset('../../img/person-default-female.jpg')}}" alt="" class="rounded-pill ratio ratio-1x1 img-profile-user" style="width: 300px; height:300px;">
                              @else
                              <img src="{{ asset('../../img/person-default.jpg')}}" alt="" class="rounded-pill ratio ratio-1x1 img-profile-user" style="width: 300px; height:300px;">
                              @endif
                              @endif
                        </div>
                  </div>
            </div>
      </div>
</body>

@endsection
