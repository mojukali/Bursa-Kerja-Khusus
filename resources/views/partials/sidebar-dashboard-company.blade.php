<div class="vstack gap-0 text-light">
      <div role="tablist" id="list-tab">
            <div class="px-3 sidebar text-light">
                  <h3 class="text-center text-light" style="font-family: 'Bai Jamjuree', sans-serif;font-weight: 400;">
                        AyoKerja!!!
                  </h3>
                  <hr>
            <a href="#list-dashboard" id="list-dashboard-list" data-bs-toggle="list" role="tab" aria-controls="list-dashboard" class="list-group-item list-group-item-action active link-underline link-underline-opacity-0 text-dark nav-link-sidebar initialColor colorLink" data-page="page1">
                  <div class="p-2 ps-4">
                        <div class="d-flex menu-sidebar align-items-center text-light">
                              <i class="bi bi-houses-fill text-light"></i>
                              DASHBOARD
                        </div>
                  </div>
            </a>
            <a href="#list-loker{{ $employE->id }}" id="list-loker-list" data-bs-toggle="list" role="tab" aria-controls="list-loker" class="list-group-item list-group-item-action link-underline link-underline-opacity-0 text-dark nav-link-sidebar initialColor colorLink" data-page="page1">
                  <div class="p-2 ps-4">
                        <div class="d-flex menu-sidebar align-items-center text-light">
                              <i class="bi bi-file-text-fill text-light"></i>
                              LOKER
                        </div>
                  </div>
            </a>
            <a href="#list-apply{{ $employE->id }}" id="list-apply-list" data-bs-toggle="list" role="tab" aria-controls="list-apply" class="list-group-item list-group-item-action link-underline link-underline-opacity-0 text-dark nav-link-sidebar initialColor colorLink" data-page="page1">
                  <div class="p-2 ps-4">
                        <div class="d-flex menu-sidebar align-items-center text-light">
                              <i class="bi bi-people-fill text-light"></i>
                              PELAMAR
                        </div>
                  </div>
            </a>
            <a href="#list-candidat{{ $employE->id }}" id="list-candidat-list" data-bs-toggle="list" role="tab" aria-controls="list-candidat" class="list-group-item list-group-item-action link-underline link-underline-opacity-0 text-dark nav-link-sidebar initialColor colorLink" data-page="page1">
                  <div class="p-2 ps-4">
                        <div class="d-flex menu-sidebar align-items-center text-light">
                              <i class="bi bi-person-fill text-light"></i>
                              KANDIDAT
                        </div>
                  </div>
            </a>
            <a href="#list-rejected{{ $employE->id }}" id="list-rejected-list" data-bs-toggle="list" role="tab" aria-controls="list-rejected" class="list-group-item list-group-item-action link-underline link-underline-opacity-0 text-dark nav-link-sidebar initialColor colorLink" data-page="page1">
                  <div class="p-2 ps-4">
                        <div class="d-flex menu-sidebar align-items-center text-light">
                              <i class="bi bi-file-earmark-x text-light"></i>
                              DITOLAK
                        </div>
                  </div>
            </a>
            <a href="{{ route('employe.edit-employe')}}" class="list-group-item list-group-item-action link-underline link-underline-opacity-0 text-dark nav-link-sidebar initialColor colorLink" data-page="page1" id="colorLink">
            <div class="p-2 ps-4">
                  <div class="d-flex menu-sidebar align-items-center text-light">
                        <i class="bi bi-pencil-square text-light"></i>
                        EDIT PROFILE
                  </div>
            </div>
            </a>
            <a href="{{ route('employe-logout')}}" class="list-group-item list-group-item-action link-underline link-underline-opacity-0 text-dark nav-link-sidebar initialColor colorLink sidebar-admin-logout" data-page="page1" id="colorLink">
            <div class="p-2 ps-4">
                  <div class="d-flex text-danger menu-sidebar align-items-center">
                        <i class="bi bi-door-open text-danger"></i>
                        LOGOUT
                  </div>
            </div>
            </a>
            <div class="px-3 ">
                  <hr>
            </div>
            <h6 class="text-center mt-5">
                  AyoKerja.Go.Blog.id
            </h6>
            </div>
      </div>
</div>
