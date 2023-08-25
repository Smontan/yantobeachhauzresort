@extends('layouts.app')

@section('title', 'About Us')   

@section('content')
    <section class="mt-5 " id="about_us">
        <div class="container-xl px-4 pt-5 my-5 text-center border-bottom">
            <h1 class="display-4 fw-bold text-body-emphasis">{{$webPage->title}} </h1>
            <p class="mb-4">{{$webPage->sub_title}} </p>

            <div class="col-lg-10 mx-auto">
              <p class="lead mb-4">{{$webPage->description}} </p>
              
            </div>
            
          </div>
    </section>
    
    <section class="mt-5">
        <div class="container-xl">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-5 col-lg-6  text-md-start ">
                <h3 class="display-5 fw-bold lh-1 text-body-emphasis">Terms and Condition</h3>
                <h5 class="lead mt-5">
                    Terms of service:
                </h5>
                <ul>
                    <li>Advance reservation is required</li>
                    <li>Check in is at 3:00 pm and Check out is at 12:00 nn</li>
                    <li>Promo rates include Monday through Thursday with a check out on Friday.</li>
                    <li>Promo rates are also applicable for stays of 6 hours or less.</li>
                    <li>Promo rates also apply when booking 3 nights or more.</li>
                    <li>Promo not valid on holidays and block out dates as advised by the Management</li>
                </ul> <br>
                <h5 class="lead">
                    Note: 
                </h5>
                <ul>
                    <li>(12 noon to 3pm, cleaning and disinfection)</li>
                    <li>All rooms are air-conditioned</li>
                    <li>Pets are not allowed</li>
                </ul>
                </div>
                <div class="col-md-5 col-lg-6 text-center">
                    @if ($webPage->image) 
                    <img src="{{asset('assets/img/termsandcondition.jpeg')}}" class="img-fluid d-none d-md-block rounded" alt="Heroimage" />
                    @endif
                </div>
            </div>
        </div>
    </section>

    
    
@endsection