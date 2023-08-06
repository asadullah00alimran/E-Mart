@extends('layouts.app')
@section('title')
Dashboard
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">
              <i class="mdi mdi-basket icon-lg text-success"></i>
              <div class="ml-3">
                <p class="mb-0">Daily Order</p>
                @php
                    $orders = DB::table('customer_orders')->get();
                    $i = 0;
                    $ti = 0;
                    $tr = 0;
                    $dr = 0;
                    $next_date = date('Y-m-d', strtotime("+1 days"));
                    foreach($orders as $order){
                        $ti++;
                        $tr = $tr + $order->total_price+$order->point_use;
                        if(date('Y-m-d',strtotime($order->created_at))>=date('Y-m-d')&&date('Y-m-d',strtotime($order->created_at))<$next_date){
                            $i++;
                            $dr = $dr + $order->total_price+$order->point_use;
                        }
                    }

                @endphp
                <h6>{{$i}}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">
              <i class="mdi mdi-rocket icon-lg text-warning"></i>
              <div class="ml-3">
                <p class="mb-0">Total Order</p>
                <h6>{{$ti}}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">
              <i class="mdi mdi-diamond icon-lg text-info"></i>
              <div class="ml-3">
                <p class="mb-0">Daily Revenue</p>
                <h6>BDT {{ $dr }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-md-center">
              <i class="mdi mdi-chart-line-stacked icon-lg text-danger"></i>
              <div class="ml-3">
                <p class="mb-0">Total Revenue</p>
                <h6>BDT {{ $tr }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
