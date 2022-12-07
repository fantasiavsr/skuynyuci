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
                        <h1 class="font-weight-bold" style="color: black">{{ $toko->name }} - Order <span
                                class="badge text-light"
                                style="font-weight:500; font-size:15px; background-color:#446DB5">{{ $order->order_number }}</span>
                        </h1>
                    </div>
                </div>


                {{-- Content Row --}}
                <div class="row">

                    {{-- Order List --}}
                    <div class="col-sm-8">

                        {{-- Sub Title --}}
                        <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                            <h1 class="h5 mb-0 text-gray-800 font-weight-bold">Order List</h1>
                            <a href="{{ route('item.order.add', ['order_number' => $order->order_number]) }}"
                                class="h7 mb-0 ">Add
                                Item</a>
                        </div>

                        {{-- Item List --}}
                        {{-- Still need fixing alignments --}}
                        {{-- Card --}}
                        @if (isset($order_list) && $order_list->count() > 0)
                            @foreach ($order_list as $item)
                                <div class="card mb-2" style="width: 100%">
                                    {{-- Card Body --}}
                                    <div class="card-body">
                                        <div class="d-sm-flex align-items-center justify-content-between">
                                            <div class="">
                                                <img class="avatar rounded-circle-"
                                                    @if ($item_type->where('id', $laundry_item->where('id', $item->laundry_item_id)->first()->item_type_id)->first() != null) src="{{ asset('img/type/' .$item_type->where('id', $laundry_item->where('id', $item->laundry_item_id)->first()->item_type_id)->pluck('image')->first()) }}"
                                                        @else
                                                        src="{{ asset('img/type/t-shirt.png') }}" @endif
                                                    alt="">
                                            </div>
                                            <div class="">
                                                <h6 class="font-weight-bold">
                                                    @php
                                                        $item_type_id = $laundry_item->where('id', $item->laundry_item_id)->first()->item_type_id;
                                                        $item_type_name = $item_type->where('id', $item_type_id)->first()->name;
                                                        echo $item_type_name;
                                                    @endphp
                                                </h6>
                                                <h6>Rp. {{ number_format($item->price, 0, ',', '.') }}</h6>
                                            </div>
                                            <div class="">
                                                <h6 class="font-weight-bold">Quantity</h6>
                                                <h6>{{ number_format($item->quantity, 0, ',', '.') }}</h6>
                                            </div>
                                            <div class="">
                                                <h6 class="font-weight-bold">Service</h6>
                                                <h6>
                                                    @php
                                                        $service_id = $laundry_service->where('id', $item->laundry_service_id)->first()->service_id;
                                                        $service_name = $service->where('id', $service_id)->first()->name;
                                                        echo $service_name;
                                                    @endphp
                                                </h6>
                                            </div>
                                            <div class="">
                                                <a href="#" class="btn btn-outline-dark px-4">edit</a>
                                            </div>
                                            <div>
                                                {{-- <a href="#" class="btn btn-outline-danger">
                                                    <i class="fas fa-fw fa-trash"></i>
                                                </a> --}}
                                                <form action="{{ route('item.order.delete', ['id' => $item->id]) }}"
                                                    method="POST" {{-- onclick="return confirm('Are you sure?')" --}}>
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger"><i
                                                            class="fas fa-fw fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="card" style="width: 100%">
                                <div class="card-body">
                                    <div class="d-sm-flex align-items-center justify-content-between">
                                        <div class="">
                                            <h6 class="font-weight-bold">No Order</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

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
                                <h6>Total Items</h6>
                                <h6 class="font-weight-bold">{{ number_format($order->total_item, 0, ',', '.') }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h6>Cost</h6>
                        <h6 class="font-weight-bold">Rp{{ number_format($order->total_price, 0, ',', '.') }}</h6>
                    </div>
                    <div class="col-sm-3">
                        @if ($order->total_item == 0)
                            <a href="#" class="btn btn-lg btn-primary btn-block shadow-custom-blue disabled"
                                style="border-radius: 10px" disabled>Order</a>
                        @else
                            <a href="#" class="btn btn-lg btn-primary btn-block shadow-custom-blue"
                                style="border-radius: 10px">Order</a>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Scroll to Top Button-->
            @include('Partials.scrolltotop')

            <!-- Logout Modal-->
            @include('Partials.logoutmodal')
        @endsection
