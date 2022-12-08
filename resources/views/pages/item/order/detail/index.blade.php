@extends('Layouts.core')

@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content" style="background-color: #F1F3F6">
            @include('Partials.navbaruser')

            <!-- Begin Page Content -->
            <div class="container pt-3">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1">
                    <div class="mb-3">
                        <h1 class="font-weight-bold" style="color: black">Detail Order {{ $order->order_number }}</h1>
                    </div>
                </div>

                {{-- Content Row --}}
                <div class="row">

                    {{-- Col  --}}
                    <div class="col">

                        <div class="text-center align-items-center my-5">
                            <img src="{{ asset('img/service_status/dummy.png') }}" class="img-fluid" alt="" style="">
                        </div>

                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            {{-- Card Body --}}
                            <div class="card-body">
                                <div>
                                    <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1 mb-4">
                                        <div class="col-md-9">
                                            <h6 style="font-weight: 900">{{ $order->order_number }}</h6>
                                        </div>
                                        <div class="text-right mr-2" style="">
                                            <span style="font-size: 130%">
                                                @if ($order->status == 'Waitting for Payment')
                                                    <span class="badge badge-danger">Waitting for Payment</span>
                                                @elseif ($order->status == 'Ongoing')
                                                    <span class="badge badge-primary">Ongoing</span>
                                                @elseif ($order->status == 'Completed')
                                                    <span class="badge badge-success">Completed</span>
                                                @elseif ($order->status == 'cancel')
                                                    <span class="badge badge-warning">Pending</span>
                                                @endif
                                            </span>
                                        </div>
                                    </div>

                                    <div class="" style="padding-left: 12px">
                                        <div class="row" style="">
                                            <div class="col-md-2">
                                                <p class="font-weight-bold">Laundry</p>
                                            </div>
                                            <div class="col">
                                                <p>{{ $order->toko->name }}</p>
                                            </div>
                                        </div>
                                        <div class="row" style="">
                                            <div class="col-md-2">
                                                <p class="font-weight-bold">Order Date</p>
                                            </div>
                                            <div class="col">
                                                <p>{{ $order->created_at }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <p class="font-weight-bold">Delivery Address</p>
                                            </div>
                                            <div class="col">
                                                <p>{{ $order->address }}</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="col">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Item</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->order_list as $item)
                                                            <tr>
                                                                <td>{{ $item->laundry_item->item_type->name }}</td>
                                                                <td>Rp. {{ number_format($item->price/$item->quantity) }}</td>
                                                                <td>{{ $item->quantity }}</td>
                                                                <td>Rp. {{ number_format($item->price) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <img src="{{ asset('img/dummy/map.png') }}" alt="" class="img-fluid"
                                            style="width: 100%">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <br>
                <br><br>
            </div>


            <!-- Scroll to Top Button-->
            @include('Partials.scrolltotop')

            <!-- Logout Modal-->
            @include('Partials.logoutmodal')
        @endsection
