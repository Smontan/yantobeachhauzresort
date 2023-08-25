 @extends('layouts.app')

@section('content')
<div class="container">
    <!--Terms of Service Modal -->
    <div class="modal fade " id="termsOfServiceModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Terms of Service</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h2>Terms and Conditions</h2>
                <ul>
                    <li>Advance reservation is required</li>
                    <li>Check in is at 3:00 pm and Check out is at 12:00 nn</li>
                    <li>Promo rates include Monday through Thursday with a check out on Friday.</li>
                    <li>Promo rates are also applicable for stays of 6 hours or less.</li>
                    <li>Promo rates also apply when booking 3 nights or more.</li>
                    <li>Promo not valid on holidays and block out dates as advised by the Management</li>
                </ul> <br>

                <h5>Note:</h5>
                <ul>
                  <li>(12 noon to 3pm, cleaning and disinfection)</li>
                  <li>All rooms are air-conditioned</li>
                  <li>Pets are not allowed</li>
                </ul>
                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
            </div>
        </div>
        </div>
    </div>

    <!--Privacy Policy Modal -->
    {{-- <div class="modal fade " id="privacyPolicyModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Privacy Policy</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             
                <h6>This Privacy Policy describes how Yanto Beach Hauz ("we", "us", or "our") collects, uses, and discloses personal information when you use our website and services (collectively, the "Services").</h6>
                <br>
                <h5>Information We Collect</h5>
                <h6>We may collect personal information from you when you voluntarily provide it to us or when you use our Services. The types of personal information we may collect include:</h6>
                <ul>
                    <li>Name</li>
                    <li>Email address</li>
                    <li>Phone number</li>
                    <li>Address</li>
                    <li>Payment information (if applicable)</li>
                    <li>Any other information you provide to us voluntarily</li>
                </ul> <br>

                <h5>Use of Personal Information</h5>
                <h6>We may use the personal information we collect for the following purposes:
                </h6>
                <ul>
                    <li>To provide and maintain our Services</li>
                    <li>To process your transactions and send you related information</li>
                    <li>To send you promotional materials and updates about our products and services</li>
                    <li>To respond to your inquiries, questions, and comments</li>
                    <li>To improve our Services and develop new features</li>
                    <li>To comply with legal obligations</li>
                </ul> <br>

                <h5>Disclosure of Personal Information</h5>
                <h6>We may disclose personal information to third-party service providers who assist us in operating our business and providing the Services. These third-party service providers have access to personal information only to perform their tasks on our behalf and are obligated not to disclose or use it for any other purpose. <br /> <br>

                    We may also disclose personal information in the following circumstances:
                </h6>
                <ul>
                    <li>To comply with applicable laws, regulations, or legal processes</li>
                    <li>To protect and defend our rights or property</li>
                    <li>To prevent or investigate possible wrongdoing in connection with the Services</li>
                    <li>To protect the personal safety of users of the Services or the public</li>
                </ul> <br>

                <h5>Data Retention</h5>
                <h6>We will retain your personal information only for as long as necessary to fulfill the purposes for which it was collected and to comply with applicable laws and regulations.
                </h6> <br>

                <h5>Security</h5>
                <h6>We take reasonable measures to protect personal information from unauthorized access, disclosure, alteration, or destruction. However, no method of transmission over the internet or electronic storage is completely secure, and we cannot guarantee absolute security.
                </h6> <br>

                <h5>Third-Party Links</h5>
                <h6>Our Services may contain links to third-party websites or services that are not owned or controlled by us. We have no control over and assume no responsibility for the privacy practices of these third-party sites or services. We encourage you to review the privacy policies of any third-party sites or services you visit.
                </h6> <br>

                <h5>Your Rights</h5>
                <h6>You have the right to access, update, and correct your personal information. You may also request the deletion or restriction of your personal information. If you wish to exercise any of these rights, please contact us using the contact information provided below.
                </h6> <br>

                <h5>Updates to this Privacy Policy</h5>
                <h6>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page. It is your responsibility to review this Privacy Policy periodically for any updates.
                </h6> <br>

                


                
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Understood</button>
            </div>
        </div>
        </div>
    </div> --}}
  
    <div class="main-content  mt-0">
        <section class="min-vh-100 mb-8">
          <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-lg-12 text-center mx-auto">
                  <h1 class="text-white mb-2 mt-5">Welcome to Yanto Beach Hauz Resort</h1>
                  <p class="text-lead text-white"></p>
                </div>
              </div>
            </div>
          </div>
          <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10">
              <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                <div class="card z-index-0">
                  <div class="card-header text-center pt-4">
                    <h5>Register</h5>
                  </div>
                  
                  <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                      <div class="mb-3">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required aria-label="Name" aria-describedby="email-addon">

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password" aria-label="Password" aria-describedby="password-addon">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm password" name="password_confirmation" required autocomplete="new-password" aria-label="Password" aria-describedby="password-addon">
                      </div>

                      <div class="form-check form-check-info text-left">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label" for="terms">
                          I agree the <a href="#" class="text-dark font-weight-bolder" data-bs-toggle="modal" data-bs-target="#termsOfServiceModal">Terms and Conditions</a>
                        </label>
                         @error('terms')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">{{ __('Register') }}</button>
                      </div>
                      <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ url('/login') }}" class="text-dark font-weight-bolder">Log in</a></p>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>

</div>


@endsection
