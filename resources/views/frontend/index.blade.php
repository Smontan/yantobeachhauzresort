@extends('layouts.app')

@section('title', 'Home Page')
    
@section('content')
    <!-- HERO SECTION -->
    <section id="hero" class="mt-2 mt-md-2">
        
        <br>
        {{-- @foreach ($webPage as $webPageItem) --}}
            
            <div class="container-xl">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-5 col-lg-6 text-center text-md-start ">
                    <h1 class="display-4 fw-bold lh-1 text-body-emphasis">{{$webPage->title}} </h1>
                    <p class="lead mb-5 text-sm">
                        {{$webPage->sub_title}}
                    </p>
                    <p class="lead">
                        {{$webPage->description}}
                    </p>
            
                    <a href="{{url('/rooms')}}" class="btn btn-primary btn-lg px-4 me-md-2 fw-bold">BOOK NOW</a>
                    </div>
                    <div class="col-md-5 col-lg-6 text-center">
                        @if ($webPage->image) 
                        <img src="{{asset('uploads/web_page/'.$webPage->image)}}" class="img-fluid d-none d-md-block rounded" alt="Heroimage" />
                        @endif
                    </div>
                </div>
            </div>
    
        {{-- @endforeach --}}            
    </section>
    <!--  -->

    {{-- Promotion section --}}
    <section class="mt-2">
        <div class="p-5 mb-4 bg-body-tertiary rounded-3">
            <div class="container-xl py-5">
                <h2 class="display-5 fw-bold">Discover our special promotion and elevate your stay to the next level of luxury! </h2>
            
                <div class="row align-items-md-stretch mt-5">
                    @forelse ($promotion as $promotionItem)
                        <div class="col-md-6">
                            <div class="h-100 p-5 text-bg-dark rounded-3">
                                <h4 class=" fw-bold">{{$promotionItem->title}} </h4>
                                <p class=" fs-5" style="white-space: pre-wrap;">{{$promotionItem->description}} </p> <br />
                                <p class=" fs-5">📅 Valid from <strong>{{$promotionItem->start_date}}</strong> to <strong>{{$promotionItem->end_date}}</strong></p>
                            </div>
                        </div>

                    @empty
                        <div class="col-md-6">
                            <div class="h-100 p-5 text-bg-dark rounded-3">
                                <p class=" fs-4">No promotion available right now</p>
                            </div>
                        </div>
                    @endforelse                    
                </div>   
            </div>
          </div>
    </section>

    
@endsection