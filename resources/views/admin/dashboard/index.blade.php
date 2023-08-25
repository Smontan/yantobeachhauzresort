@extends('layouts.admin')

@section('content')
<div class="row">
  @if (session('message'))
      <h4 class="alert alert-success">
        {{session('message')}}
      </h4>
  @endif
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="me-md-3 me-xl-5">
            <h2>Welcome back, </h2>
            <p class="mb-md-0">Your analytics dashboard template.</p>
          </div>
          {{-- <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Analytics</p>
          </div> --}}
        </div>
        {{-- <div class="d-flex justify-content-between align-items-end flex-wrap">
          <button type="button" class="btn btn-light bg-white btn-icon me-3 d-none d-md-block ">
            <i class="mdi mdi-download text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-clock-outline text-muted"></i>
          </button>
          <button type="button" class="btn btn-light bg-white btn-icon me-3 mt-2 mt-xl-0">
            <i class="mdi mdi-plus text-muted"></i>
          </button>
          <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
        </div> --}}
      </div>
    </div>
  </div>

  {{-- Overview --}}
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body dashboard-tabs p-0">
          <ul class="nav nav-tabs px-4" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="reservations-tab" data-bs-toggle="tab" href="#reservations" role="tab" aria-controls="reservations" aria-selected="true">Reservations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="rooms-tab" data-bs-toggle="tab" href="#rooms" role="tab" aria-controls="rooms" aria-selected="false">Rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="revenue-tab" data-bs-toggle="tab" href="#revenue" role="tab" aria-controls="revenue" aria-selected="false">Revenue</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="users-tab" data-bs-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="false">Users</a>
            </li>
          </ul>
          <div class="tab-content py-0 px-0">

            {{-- Reservations tab --}}
            <div class="tab-pane fade show active" id="reservations" role="tabpanel" aria-labelledby="reservations-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">
                <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-ticket me-3 icon-lg text-primary"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Reservations</small>
                    <h5 class="me-2 mb-0">{{$reservations}} </h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-exclamation me-3 icon-lg text-danger"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Pending Reservation</small>
                    <h5 class="me-2 mb-0">{{$pendingReservations}} </h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi mdi-ticket-confirmation me-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Confirmed Reservation</small>
                    <h5 class="me-2 mb-0">{{$confirmedReservations}} </h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-checkbox-marked me-3 icon-lg text-warning"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Check-in</small>
                    <h5 class="me-2 mb-0">{{$checkinReservations}} </h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-cancel me-3 icon-lg text-danger"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Cancel</small>
                    <h5 class="me-2 mb-0">{{$cancelReservations}} </h5>
                  </div>
                </div>                
              </div>
            </div>

             {{-- Rooms tab --}}
            <div class="tab-pane fade" id="rooms" role="tabpanel" aria-labelledby="rooms-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">

                <div class="d-none d-xl-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-hotel me-3 icon-lg text-warning"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Rooms</small>
                    <h5 class="me-2 mb-0">{{$rooms}} </h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-download me-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Rooms Occupied Today</small>
                    <h5 class="me-2 mb-0">{{$todaysReservation}} </h5>
                  </div>
                </div>
                
              </div>
            </div>

            {{-- Revenue Tab --}}
            <div class="tab-pane fade" id="revenue" role="tabpanel" aria-labelledby="revenue-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-currency-usd me-3 icon-lg text-danger"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Revenue</small>
                    <h5 class="me-2 mb-0">{{$totalRevenue}} </h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-cash me-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Today's Profit</small>
                    <h5 class="me-2 mb-0">{{$todayProfit}} </h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi  mdi-cash-100 me-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Monthly Profit</small>
                    <h5 class="me-2 mb-0">{{$monthlyProfit}} </h5>
                  </div>
                </div>
                <div class="d-flex py-3 border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-cash-multiple me-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Yearly Profit</small>
                    <h5 class="me-2 mb-0">{{$yearlyProfit}} </h5>
                  </div>
                </div>
              </div>
            </div>

            {{-- Users Tab --}}
            <div class="tab-pane fade" id="users" role="tabpanel" aria-labelledby="users-tab">
              <div class="d-flex flex-wrap justify-content-xl-between">
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-account-multiple me-3 icon-lg text-info"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Total Users</small>
                    <h5 class="me-2 mb-0">{{$users}} </h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-account-box me-3 icon-lg text-success"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Admins</small>
                    <h5 class="me-2 mb-0">{{$adminCount}} </h5>
                  </div>
                </div>
                <div class="d-flex border-md-right flex-grow-1 align-items-center justify-content-center p-3 item">
                  <i class="mdi mdi-account me-3 icon-lg text-warning"></i>
                  <div class="d-flex flex-column justify-content-around">
                    <small class="mb-1 text-muted">Users</small>
                    <h5 class="me-2 mb-0">{{$userCount}} </h5>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Revenue Graph --}}
  {{-- <div class="row">
    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Cash deposits</p>
          <p class="mb-4">To start a blog, think of a topic about and first brainstorm party is ways to write details</p>
          <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
          <canvas id="cash-deposits-chart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Total Revenue</p>
          <h1>P {{$totalRevenue}} </h1>
          <h4>Gross sales over the years</h4>
          <p class="text-muted">Today, many people rely on computers to do homework, work, and create or store useful information. Therefore, it is important </p>
          <div id="total-sales-chart-legend"></div>                  
        </div>
        <canvas id="total-sales-chart"></canvas>
      </div>
    </div>
  </div> --}}

  

  {{-- Recent Reservations --}}
  <div class="row">
    <div class="col-md-12 stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Recent Reservations</p>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Room Name</th>
                    <th>Total Price</th>
                    <th>Check-in Date</th>
                    <th>Check-out Date</th>
                    <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($latestReservations as $latest)
                  <tr>
                    <td>{{$latest->first_name.' '.$latest->last_name}} </td>
                    <td>{{$latest->room->name}} </td>
                    <td>P {{$latest->total_price}} </td>
                    <td>{{$latest->check_in}} </td>
                    <td>{{$latest->check_out}} </td>
                    <td><button class="btn btn-info btn-rounded text-capitalize btn-sm">{{$latest->status}}</button> </td>
                  </tr>
                @empty
                <tr>
                  <td colspan="6"><span class="text-center h4"> No Reservation yet</span> </td>
                </tr>
                @endforelse
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  

@endsection