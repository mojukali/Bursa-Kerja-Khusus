<nav class="navbar shadow-sm p-3 navbar-expand-lg stroke" style="background-color: #3d216f;">
      <div class="container">
            @yield('nav-link-employer')

            <div class="btn-group">
                  <button class="btn btn-sm btn-outline-light  dropdown-toggle pe-4 ps-4 pt-2 pb-2 fw-bold" data-bs-toggle="dropdown"
                    aria-expanded="false" style="border: 2px solid; border-color: #8CB9BD;" type="button">
                      @auth
                      {{ Auth::user()->name }}
                      @endauth
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdowen dropdown-item text-danger fw-bold" href="{{ route('employe-logout')}}"
                        ><i class="bi bi-person-circle me-2"></i> LOGOUT</a
                      >
                    </li>
                  </ul>
            </div>
      </div>
</nav>