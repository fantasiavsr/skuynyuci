@extends('Layouts.core')

@section('content')
    {{-- <div class="main" style="background-color: #F1F3F6">
        <div class="text-secondary px-4 py-5 text-center">
            <div class="py-5">
                <h1>Good Morning, {{ auth()->user()->username }}</h1>
            </div>
        </div>
    </div> --}}

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
                        <h1 class="font-weight-bold" style="color: black">{{ $toko->name }} - Order</h1>
                    </div>
                </div>


                {{-- Content Row --}}
                <div class="row">

                    {{-- Order List --}}
                    <div class="col-sm-8">

                        {{-- Sub Title --}}
                        <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                            <h1 class="h5 mb-0 text-gray-800 font-weight-bold">Order List</h1>
                            <a href="{{ route('item.order.add', ['order_number' => $order->order_number]) }}" class="h7 mb-0 ">Add Item</a>
                        </div>

                        {{-- Still need fixing alignments --}}
                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            @if (isset($order_list))
                                @foreach ($order_list as $item)
                                    {{-- Card Body --}}
                                    <div class="card-body">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <div class="">
                                                <img class="avatar rounded-circle-"
                                                    src="{{ asset('img/type/t-shirt.png') }}" alt="">
                                            </div>
                                            <div class="">
                                                <h6 class="font-weight-bold">{{ $item->laundry_item->item_type->name }}</h6>
                                                <h6>Rp. {{ $item->price }}</h6>
                                            </div>
                                            <div class="">
                                                <h6 class="font-weight-bold">Quantity</h6>
                                                <h6>{{ $item->quantity }}</h6>
                                            </div>
                                            <div class="">
                                                <h6 class="font-weight-bold">Service</h6>
                                                <h6>{{ $item->service->name }}</h6>
                                            </div>
                                            <div class="">
                                                <a href="#" class="btn btn-outline-dark px-4">edit</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center justify-content-between">
                                        <div class="">
                                            <h6 class="font-weight-bold">No Order</h6>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            {{-- Card Body --}}
                            {{-- <div class="card-body">
                                <div class="d-sm-flex align-items-center justify-content-between">
                                    <div class="">
                                        <img class="avatar rounded-circle-" src="{{ asset('img/type/t-shirt.png') }}"
                                            alt="">
                                    </div>
                                    <div class="">
                                        <h6 class="font-weight-bold">T-Shirt</h6>
                                        <h6>Rp. 25.000</h6>
                                    </div>
                                    <div class="">
                                        <h6 class="font-weight-bold">Quantity</h6>
                                        <h6>2</h6>
                                    </div>
                                    <div class="">
                                        <h6 class="font-weight-bold">Service</h6>
                                        <h6>Wash</h6>
                                    </div>
                                    <div class="">
                                        <a href="#" class="btn btn-outline-dark px-4">edit</a>
                                    </div>
                                </div>
                            </div> --}}

                        </div>

                    </div>

                    {{-- Delivery Address --}}
                    <div class="col-sm-4">

                        {{-- Sub Title --}}
                        <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                            <h1 class="h5 mb-0 text-gray-800 font-weight-bold">Delivery Address</h1>
                            <a href="#" class="h7 mb-0 ">Edit Address</a>
                        </div>

                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            {{-- Card Body --}}
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <img src="{{ asset('img/dummy/map.png') }}" alt="" class="img-fluid"
                                        style="width: 100%">
                                </div>
                                <div>
                                    <h6>name</h6>
                                    <h6 class="font-weight-bold">{{ $user->name }}</h6>
                                    <h6>address</h6>
                                    <h6 class="font-weight-bold">Jl. Raya Cibubur No. 1, Cibubur, Jakarta Timur</h6>
                                    <h6>phone</h6>
                                    <h6 class="font-weight-bold">{{ $user->phone }}</h6>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <br>
                <br><br>
            </div>

            {{-- Sticky Checkout --}}
            <div class="container px-3 py-5 shadow-custom"
                style="background-color: #ffffff; position:sticky; position:-webkit-sticky; bottom:0; border-radius:25px 25px 0px 0px">
                <div class="row px-5">
                    <div class="col">
                        <div class="row">
                            <div class="pr-4">
                                <img class="avatar rounded-circle-" src="{{ asset('img/dummy/checkout.png') }}"
                                    alt="">
                            </div>
                            <div>
                                <h6 class="font-weight-bold">Total Items</h6>
                                <h6>Rp. 50.000</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h6 class="font-weight-bold">Cost</h6>
                        <h6>Rp. 10.000</h6>
                    </div>
                    <div class="col-sm-3">
                        <a href="#" class="btn btn-lg btn-primary btn-block shadow-custom-blue"
                            style="border-radius: 10px">Order</a>
                    </div>
                </div>
            </div>
            <!-- Scroll to Top Button-->
            @include('Partials.scrolltotop')

            <!-- Logout Modal-->
            @include('Partials.logoutmodal')
        @endsection
