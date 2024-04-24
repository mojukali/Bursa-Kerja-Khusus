<!-- modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                        <button type="button" class=" btn-close mx-4 my-4" data-bs-dismiss="modal" aria-label="Close"></button>
                  <form action="{{ route('employe-login')}}" method="POST">
                        @csrf
                        <div class="modal-body px-5">
                              <div class="mb-3">
                                    <div class="text-dark fw-bolder fs-3 text-center">Sign-In</div>
                              </div>
                              <div class="mb-3 text-center">
                                    <label for="exampleFormControlInput1" class="form-label">ALAMAT EMAIL</label>
                                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="example@gmail.com">
                              </div>
                              <div class="mb-4 text-center">
                                    <label for="exampleFormControlInput1" class="form-label">PASSWORD</label>
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="******">
                              </div>
                              <div class="btn-group">
                                    <button type="submit" class="btn btn-outline-dark w-50">Enter</button>
                                    <button type="button" class="btn btn-outline-danger w-50" data-bs-dismiss="modal">Cancel</button>
                              </div>
                        </div>
                  </form>
            </div>
      </div>
</div>