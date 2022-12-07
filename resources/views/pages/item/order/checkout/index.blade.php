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
                        <h1 class="font-weight-bold" style="color: black">{{ $toko->name }} - Checkout</h1>
                    </div>
                </div>

                {{-- Content Row --}}
                <div class="row">

                    {{-- Add Item Form --}}
                    <div class="col">

                        <form action="{{ route('item.order.checkout.store') }}" method="POST">
                            @csrf
                            {{-- Sub Title --}}
                            {{-- <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                            <h1 class="h5 mb-0 text-gray-800 font-weight-bold">Add Item</h1>
                        </div> --}}

                            {{-- Still need fixing alignments --}}
                            {{-- Card --}}
                            <div class="card mb-3" style="width: 100%">
                                {{-- Card Body --}}
                                <div class="card-body">


                                    <input type="hidden" id="order_id" name="order_id" value="{{ $order->id }}">
                                    <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">

                                    <div class="col-sm form-check mb-4">
                                        <input class="form-check-input" type="radio" name="order_type"
                                            id="flexRadioDefault1" value="Self service" checked>
                                        <label class="form-check-label font-weight-bold" for="flexRadioDefault1">
                                            Self service
                                        </label>
                                    </div>

                                    <hr>

                                    <div class="col-sm form-check">
                                        <input class="form-check-input" type="radio" name="order_type"
                                            id="flexRadioDefault2" value="Delivery service">
                                        <label class="form-check-label font-weight-bold" for="flexRadioDefault2">
                                            Delivery service
                                        </label>
                                    </div>

                                </div>
                            </div>

                            {{-- Sub Title --}}
                            <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                                <h1 class="h5 mb-0 text-gray-800 font-weight-bold">Payment Method</h1>
                            </div>

                            {{-- Card --}}
                            <div class="card mb-3" style="width: 100%">
                                {{-- Card Body --}}
                                <div class="card-body">

                                    <div class="col-sm form-check mb-4">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="flexRadioDefault3" value="Cash" checked>
                                        <label class="form-check-label font-weight-bold" for="flexRadioDefault3">
                                            Cash
                                        </label>
                                    </div>

                                    <hr>

                                    <div class="col-sm form-check mb-4">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="flexRadioDefault4" value="Credit Card">
                                        <label class="form-check-label font-weight-bold" for="flexRadioDefault4">
                                            Credit Card
                                        </label>
                                    </div>

                                    <hr>

                                    <!-- Submit button -->
                                    <div class="row">
                                        <div class="col">
                                            {{-- <a class="btn btn-secondary btn-block px-5" href="{{ route('item.order.store') }}">Continue</a> --}}
                                            <button type="" class="btn btn-outline-primary">Add new method</button>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- Add some order detail later with card --}}

                            <!-- Submit button -->
                            {{-- <a class="btn btn-secondary btn-block px-5" href="{{ route('item.order.store') }}">Continue</a> --}}
                            <button type=""
                                class="btn btn-lg btn-primary float-right shadow-custom-blue mt-3 mr-3 px-5">Pay (Rp{{ number_format($order->total_price, 0, ',', '.') }})</button>

                        </form>
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
