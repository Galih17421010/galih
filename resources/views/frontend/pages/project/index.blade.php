@extends('frontend.index')
@section('title','Projects')
@section('content')
<div class="section-py landing-team position-relative">
    <img src={{asset("assets/img/hero-bg-light.png")}} alt="hero background" class="position-absolute top-0 start-0 w-100 h-100 z-n1" data-speed="1" data-app-light-img="hero-bg-light.png" data-app-dark-img="hero-bg-dark.png" />
    <div class="container bg-icon-right position-relative">
        <img src={{asset("assets/img/bg-right-icon-light.png")}} alt="section icon" class="position-absolute top-0 end-0" data-speed="1" data-app-light-img="bg-right-icon-light.png" data-app-dark-img="bg-right-icon-dark.png" />
        <h6 class="text-center d-flex justify-content-center align-items-center mb-6">
          <img src={{asset("assets/img/section-tilte-icon.png")}} alt="section title icon" class="me-2" height="19" />
          <span class="text-uppercase">My Projects</span>
        </h6>
        <h5 class="text-center mb-2"><span class="h4 fw-bold">Supported</span> by Real People</h5>
        <p class="text-center fw-medium mb-4 mb-md-12 pb-7">Who is behind these great-looking interfaces?</p>
        <div class="row gy-lg-5 gy-12 mt-2">
          <div class="col-lg-3 col-sm-6">
            <div class="card card-hover-border-primary mt-4 mt-lg-0 shadow-none">
              <div class="bg-label-primary position-relative team-image-box">
                {{-- <img src={{asset("assets/img/team-member-1.png")}} class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" /> --}}
              </div>
              <div class="card-body text-center">
                <h5 class="card-title mb-0">Sophie Gilbert</h5>
                <p class="card-text mb-3">Project Manager</p>
                <div class="text-center team-media-icons">
                  <a href="javascript:void(0);" class="text-heading" target="_blank">
                    <i class="tf-icons ri-facebook-circle-line ri-22px me-2"></i>
                  </a>
                  <a href="javascript:void(0);" class="text-heading" target="_blank">
                    <i class="tf-icons ri-twitter-line ri-22px me-2"></i>
                  </a>
                  <a href="javascript:void(0);" class="text-heading" target="_blank">
                    <i class="tf-icons ri-linkedin-box-line ri-22px"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="card card-hover-border-danger mt-4 mt-lg-0 shadow-none">
              <div class="bg-label-danger position-relative team-image-box">
                {{-- <img src={{asset("assets/img/team-member-2.png")}} class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" /> --}}
              </div>
              <div class="card-body text-center">
                <h5 class="card-title mb-0">Nannie Ford</h5>
                <p class="card-text mb-3">Development Lead</p>
                <div class="text-center team-media-icons">
                  <a href="javascript:void(0);" class="text-heading" target="_blank">
                    <i class="tf-icons ri-facebook-circle-line ri-22px me-2"></i>
                  </a>
                  <a href="javascript:void(0);" class="text-heading" target="_blank">
                    <i class="tf-icons ri-twitter-line ri-22px me-2"></i>
                  </a>
                  <a href="javascript:void(0);" class="text-heading" target="_blank">
                    <i class="tf-icons ri-linkedin-box-line ri-22px"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="card card-hover-border-success mt-4 mt-lg-0 shadow-none">
              <div class="bg-label-success position-relative team-image-box">
                {{-- <img src={{asset("assets/img/team-member-3.png")}} class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" /> --}}
              </div>
              <div class="card-body text-center">
                <h5 class="card-title mb-0">Chris Watkins</h5>
                <p class="card-text mb-3">Marketing Manager</p>
                <div class="text-center team-media-icons">
                  <a href="javascript:void(0);" class="text-heading" target="_blank">
                    <i class="tf-icons ri-facebook-circle-line ri-22px me-2"></i>
                  </a>
                  <a href="javascript:void(0);" class="text-heading" target="_blank">
                    <i class="tf-icons ri-twitter-line ri-22px me-2"></i>
                  </a>
                  <a href="javascript:void(0);" class="text-heading" target="_blank">
                    <i class="tf-icons ri-linkedin-box-line ri-22px"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6">
            <div class="card card-hover-border-info mt-4 mt-lg-0 shadow-none">
              <div class="bg-label-info position-relative team-image-box">
                {{-- <img src={{asset("assets/img/team-member-4.png")}} class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" /> --}}
              </div>
              <div class="card-body text-center">
                <h5 class="card-title mb-0">Paul Miles</h5>
                <p class="card-text mb-3">UI Designer</p>
                <div class="text-center team-media-icons">
                  <a href="javascript:void(0);" class="text-heading" target="_blank">
                    <i class="tf-icons ri-facebook-circle-line ri-22px me-2"></i>
                  </a>
                  <a href="javascript:void(0);" class="text-heading" target="_blank">
                    <i class="tf-icons ri-twitter-line ri-22px me-2"></i>
                  </a>
                  <a href="javascript:void(0);" class="text-heading" target="_blank">
                    <i class="tf-icons ri-linkedin-box-line ri-22px"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row gy-lg-5 gy-12 mt-2">
            <div class="col-lg-3 col-sm-6">
              <div class="card card-hover-border-primary mt-4 mt-lg-0 shadow-none">
                <div class="bg-label-primary position-relative team-image-box">
                  {{-- <img src={{asset("assets/img/team-member-1.png")}} class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" /> --}}
                </div>
                <div class="card-body text-center">
                  <h5 class="card-title mb-0">Sophie Gilbert</h5>
                  <p class="card-text mb-3">Project Manager</p>
                  <div class="text-center team-media-icons">
                    <a href="javascript:void(0);" class="text-heading" target="_blank">
                      <i class="tf-icons ri-facebook-circle-line ri-22px me-2"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-heading" target="_blank">
                      <i class="tf-icons ri-twitter-line ri-22px me-2"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-heading" target="_blank">
                      <i class="tf-icons ri-linkedin-box-line ri-22px"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card card-hover-border-danger mt-4 mt-lg-0 shadow-none">
                <div class="bg-label-danger position-relative team-image-box">
                  {{-- <img src={{asset("assets/img/team-member-2.png")}} class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" /> --}}
                </div>
                <div class="card-body text-center">
                  <h5 class="card-title mb-0">Nannie Ford</h5>
                  <p class="card-text mb-3">Development Lead</p>
                  <div class="text-center team-media-icons">
                    <a href="javascript:void(0);" class="text-heading" target="_blank">
                      <i class="tf-icons ri-facebook-circle-line ri-22px me-2"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-heading" target="_blank">
                      <i class="tf-icons ri-twitter-line ri-22px me-2"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-heading" target="_blank">
                      <i class="tf-icons ri-linkedin-box-line ri-22px"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card card-hover-border-success mt-4 mt-lg-0 shadow-none">
                <div class="bg-label-success position-relative team-image-box">
                  {{-- <img src={{asset("assets/img/team-member-3.png")}} class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" /> --}}
                </div>
                <div class="card-body text-center">
                  <h5 class="card-title mb-0">Chris Watkins</h5>
                  <p class="card-text mb-3">Marketing Manager</p>
                  <div class="text-center team-media-icons">
                    <a href="javascript:void(0);" class="text-heading" target="_blank">
                      <i class="tf-icons ri-facebook-circle-line ri-22px me-2"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-heading" target="_blank">
                      <i class="tf-icons ri-twitter-line ri-22px me-2"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-heading" target="_blank">
                      <i class="tf-icons ri-linkedin-box-line ri-22px"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6">
              <div class="card card-hover-border-info mt-4 mt-lg-0 shadow-none">
                <div class="bg-label-info position-relative team-image-box">
                  {{-- <img src={{asset("assets/img/team-member-4.png")}} class="position-absolute card-img-position bottom-0 start-50 scaleX-n1-rtl" alt="human image" /> --}}
                </div>
                <div class="card-body text-center">
                  <h5 class="card-title mb-0">Paul Miles</h5>
                  <p class="card-text mb-3">UI Designer</p>
                  <div class="text-center team-media-icons">
                    <a href="javascript:void(0);" class="text-heading" target="_blank">
                      <i class="tf-icons ri-facebook-circle-line ri-22px me-2"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-heading" target="_blank">
                      <i class="tf-icons ri-twitter-line ri-22px me-2"></i>
                    </a>
                    <a href="javascript:void(0);" class="text-heading" target="_blank">
                      <i class="tf-icons ri-linkedin-box-line ri-22px"></i>
                    </a>
                  </div>

                </div>
              </div>
            </div>
          </div>
      </div>
</div>
@endsection
