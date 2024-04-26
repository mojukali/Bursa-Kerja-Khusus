<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Ayo Kerja</title>
      <link rel="website icon" type="jpg" href="../../../../img/jobseeker-bg-darkblue.jpg">
      <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css" />
      <link rel="stylesheet" href="../../css/style.css" />
      <link rel="stylesheet" href="../../css/dashboard.css" />
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-8o5ZR1Z5g8dyjEgjWZBP08fJ2A53HOJM+UXYPZM/Zq8x9o58r+AZa68y6V9Vc74YO/l6BL/+tnUcckyU5T2zpg==" crossorigin="anonymous" />
      {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> --}}
</head>
<body>
      <nav class="navbar bg-dark shadow-sm p-3 navbar-expand-lg stroke">
            <div class="container">
                  <!-- NAVBAR NOT USER -->
                  <div class="collapse navbar-collapse" id="navbarText">
                        @guest
                    <ul class="navbar-nav">
                      <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="/"
                          >HOME</a
                        >
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="{{ route('company-list')}}"
                          >PERUSAHAAN</a
                        >
                      </li>
                      <li class="nav-item">
                      <a class="nav-link text-light" aria-current="page" href="{{route('about')}}">
                        TENTANG</a
                        >
                      </li>
                    </ul>
                    <a class="navbar-brand fw-bold" href="/" style="color: #8CB9BD;">AyoKerja</a>
                        @guest
                        <form class="ms-auto d-flex justify-content-end" role="search">
                              <button class="btn btn-outline-light me-2 px-4 fw-bold" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="color:#8CB9BD; border: 2px solid; border-color: #8CB9BD;" id="liveToastBtn">
                                    Login
                              </button>
                              <a href="{{ route('employer-site')}}" class="btn btn-outline-light me-2 fw-bold" style="color:#8CB9BD; border: 2px solid; border-color: #8CB9BD;" type="button">
                                    Employer
                              </a>
                        </form>
                        @endguest
                    @else
                  <!-- NAVBAR USER -->
                  <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                      <a class="nav-link text-light" aria-current="page" href="/user/dashboard"
                        >HOME</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light" aria-current="page" href="{{ route('user.company-list')}}"
                        >PERUSAHAAN</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-light" aria-current="page" href="{{route('user.about')}}"
                        >TENTANG</a
                      >
                    </li>
                  </ul>
                  <div class="btn-group">
                    <button class="btn btn-sm btn-secondary dropdown-toggle pe-4 ps-4 pt-2 pb-2 fw-bold" data-bs-toggle="dropdown"
                      aria-expanded="false" style="border: 2px solid; border-color: #8CB9BD;" type="button">
                        @auth
                        {{ Auth::user()->name }}
                        @endauth
                    </button>
                    <ul class="dropdown-menu">
                      <li>
                        <a class="dropdown-item fw-bold" href="{{ route('user.user-profile',['id' => $dataU->id]) }}"
                          ><i class="bi bi-person-circle me-2"></i> PROFILE</a
                        >
                      </li>
                      <li>
                        <a class="dropdown-item text-danger fw-bold" href="{{ route('user.logout')}}"
                          ><i class="bi bi-person-circle me-2"></i> LOGOUT</a
                        >
                      </li>
                    </ul>
                  </div>
               </div>
            @endguest
            </div>
      </nav>
      @yield('content')
      <script src="../../../../bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
      <script>
            CKEDITOR.replace('');
      </script>
      <script src="../../../js/script.js"></script>
      <script>
            fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/provinces.json`)
                  .then(response => response.json())
                  .then(provinces => {
                        var data = provinces;
                        var tampung = '<option>Pilih Provinsi</option>';
                        data.forEach(element => {
                              tampung += `<option data-reg="${element.id}" value="${element.name}">${element.name}</option>`;
                        });
                        document.getElementById('provinsi').innerHTML = tampung;
                  });

            const selectProvinsi = document.getElementById('provinsi');

            selectProvinsi.addEventListener('change', (e) => {
                  var provinsi = e.target.options[e.target.selectedIndex].dataset.reg;
                  fetch(`https://kanglerian.github.io/api-wilayah-indonesia/api/regencies/${provinsi}.json`)
                        .then(response => response.json())
                        .then(provinces => {
                              var data = provinces;
                              var tampung = '<option>Pilih Kota/Kabupaten</option>';
                              data.forEach(element => {
                                    tampung += `<option data-dist="${element.id}" value="${element.name}">${element.name}</option>`;
                              });
                              document.getElementById('kota_kabupaten').innerHTML = tampung;
                        });
            });

      </script>
      
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
