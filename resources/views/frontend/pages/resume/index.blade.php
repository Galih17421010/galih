@extends('frontend.index')
@section('title','Resume')
@section('content')
<div class="section-py position-relative">
    <img src={{asset("assets/img/hero-bg-light.png")}} alt="hero background" class="position-absolute top-0 start-0 w-100 h-100 z-n1" data-speed="1" data-app-light-img="hero-bg-light.png" data-app-dark-img="hero-bg-dark.png" />
    <div class="container bg-icon-left position-relative">
        <img src={{asset("assets/img/bg-left-icon-light.png")}} alt="section icon" class="position-absolute top-0 start-0" data-speed="1" data-app-light-img="bg-left-icon-light.png" data-app-dark-img="bg-left-icon-dark.png" />
        <h6 class="text-center d-flex justify-content-center align-items-center mb-6">
          <img src="assets/img/section-tilte-icon.png" alt="section title icon" class="me-2" height="19" />
          <span class="text-uppercase">Resume</span>
        </h6>
        <h5 class="text-center mb-2"><span class="h4 fw-bold">Lets work</span> together</h5>
        <p class="text-center fw-medium mb-4 mb-md-12 pb-3">Any question or remark? just write us a message</p>
        <div class="row gy-4">
            <div class="col-lg-1"></div>
          <div class="col-lg-10">
            <div class="card">
              <div class="card-body">
                <h5 class="mb-6 text-center">Galih Agus Saputra</h5>
                <form>
                  <div class="row g-5">
                    <div class="col-md-6">
                      <div class="form-floating form-floating-outline">
                        <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                        <label for="basic-default-fullname">Full name</label>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-floating form-floating-outline">
                        <input type="email" class="form-control" id="basic-default-email" placeholder="johndoe99@gmail.com" />
                        <label for="basic-default-email">Email address</label>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                          <label for="basic-default-fullname">Full name</label>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                          <input type="email" class="form-control" id="basic-default-email" placeholder="johndoe99@gmail.com" />
                          <label for="basic-default-email">Email address</label>
                        </div>
                      </div><div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                          <label for="basic-default-fullname">Full name</label>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                          <input type="email" class="form-control" id="basic-default-email" placeholder="johndoe99@gmail.com" />
                          <label for="basic-default-email">Email address</label>
                        </div>
                      </div><div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                          <label for="basic-default-fullname">Full name</label>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                          <input type="email" class="form-control" id="basic-default-email" placeholder="johndoe99@gmail.com" />
                          <label for="basic-default-email">Email address</label>
                        </div>
                      </div><div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
                          <label for="basic-default-fullname">Full name</label>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-floating form-floating-outline">
                          <input type="email" class="form-control" id="basic-default-email" placeholder="johndoe99@gmail.com" />
                          <label for="basic-default-email">Email address</label>
                        </div>
                      </div>
                    <div class="col-12">
                      <div class="form-floating form-floating-outline">
                        <textarea class="form-control h-px-200" placeholder="Message" aria-label="Message" id="basic-default-message"></textarea>
                        <label for="basic-default-message">Message</label>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mt-5">Send inquiry</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection
