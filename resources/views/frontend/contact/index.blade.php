@extends('layouts.app')

@section('title', 'Contact Us')   

@section('content')


<!-- CONTACT US -->
<section class="mt-5">
    <div class="container-xl">
        <div class="row justify-content-center ">
            
                    <div class="col-md-8 col-lg-7">
                        

                        <!-- CONTACT US OUR OFFICE -->
                        <div class=" text-md-start mb-5">
                            <h3 class="display-5 fw-bold mb-2">Location</h3>

                            {{-- Google maps of yanto beach hauz --}}
                            <div class="ratio ratio-1x1 mb-5">
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3941.5937492577686!2d126.3070169738665!3d8.917305990729707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x330241f57d66f4db%3A0x7a19455d61475bdf!2sYANTO%20BEACH%20HAUS!5e0!3m2!1sen!2sph!4v1692682268810!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded"></iframe>
                            </div>

                            <p class="lead" style=>Nestled in the heart of Cagwait, <strong>Yanto Beach Hauz</strong> offers a serene oasis where nature's beauty and modern comfort harmonize. </p>
                            <h4 class="lead fw-bold">Our resort is situated at: </h4>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                  🌎
                                  <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                      <h6 class="mb-0">Address: </h6>
                                      <p class="mb-0 opacity-75">Purok 6 White Beach, Poblacion, Cagwait, Surigao del Sur</p>
                                    </div>
                                  </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                    🏖️
                                  <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                      <h6 class="mb-0">Beach frontaccess: </h6>
                                      <p class="mb-0 opacity-75">Just steps away from the pristine Cagwait White Beach</p>
                                    </div>
                                  </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                    🌇
                                  <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                      <h6 class="mb-0">Nearby Atractions: </h6>
                                      <p class="mb-0 opacity-75">Explore Cagwait White Beach, Plaza Resort and Lolinghayaw Resort</p>
                                    </div>
                                  </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                    🗺️
                                  <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                      <h6 class="mb-0">GPS Coordinates: </h6>
                                      <p class="mb-0 opacity-75">8.917290072435723, 126.30965624152587</p>
                                    </div>
                                  </div>
                                </a>
                                       
                            </div>

                            <h4 class="lead fw-bold mt-5">For reservation and inquiries, reach out to us at:</h4>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                    📞
                                  <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                      <h6 class="mb-0">Phone: </h6>
                                      <p class="mb-0 opacity-75">09630990980</p>
                                    </div>
                                  </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                    📧
                                  <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                      <h6 class="mb-0">Email: </h6>
                                      <p class="mb-0 opacity-75">yantobeachhaus@gmail.com</p>
                                    </div>
                                  </div>
                                </a>
                            </div>
                        </div>
                    </div>

                <!-- CONTACT US FORM -->
                <div class="col-md8 col-lg-5 " id="contact_us">
                    <div class="card p-3 mt-5 sticky-top p-md-4">
                        <!-- CONTACT US HEADER -->
                        <div class="text-center text-md-start mb-5">
                            <h1 class="display-4 fw-bold lh-1 text-body-emphasis">{{$webPage->title}} </h1>
                            <p class="lead mb-5 text-sm">
                                {{$webPage->sub_title}}
                            </p>
                        </div>
                        <form action="{{url('/contact_us')}} " method="POST">
                            @csrf
                            <div class="row text-start g-3">
                                <div class="col-6">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name"
                                        required>
                                </div>
                                <div class="col-6">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address"
                                        required>
                                </div>
                                <div class="col-12">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="string" class="form-control" name="phone" id="phone" placeholder="Phone Number"
                                        required`>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="message" class="form-label">Message</label>
                                    <textarea class="form-control" name="message" id="message" placeholder="Message" rows="5"
                                        required></textarea>
                                </div>
    
                                <button type="submit" class="btn btn-primary text-white  btn-lg ">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
              
        </div>
    </div>
</section><br><br>
    
@endsection