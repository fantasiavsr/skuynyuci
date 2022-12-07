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
                        <h1 class="font-weight-bold" style="color: black">{{ $toko->name }} - Delivery Address</h1>
                    </div>
                </div>


                {{-- Content Row --}}
                <div class="row">

                    {{-- Add Item Form --}}
                    <div class="col">

                        {{-- Sub Title --}}
                        <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                            <h1 class="h5 mb-0 text-gray-800 font-weight-bold">Delivery Address</h1>
                        </div>

                        {{-- Still need fixing alignments --}}
                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            {{-- Card Body --}}
                            <div class="card-body">
                                <form action="{{ route('item.order.delivery.store') }}" method="POST">
                                    @csrf

                                    <input type="hidden" id="order_id" name="order_id" value="{{ $order->id }}">
                                    <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" value="" autofocus>
                                        </div>

                                    </div>

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control disabled" value="{{ $user->name }}" disabled autofocus>
                                        </div>

                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Phone</label>
                                            <input type="text" name="phine" class="form-control disabled" value="{{ $user->phone }}" disabled autofocus>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('item.order.detail', ['id'=>$toko->id,'order_number'=>$order->order_number]) }}" class="btn btn-block px-5">Cancel</a>
                                        </div>
                                        <div class="col">
                                            {{-- <a class="btn btn-secondary btn-block px-5" href="{{ route('item.order.store') }}">Continue</a> --}}
                                            <button type="submit" class="btn btn-primary btn-block px-5">Continue</button>
                                        </div>
                                    </div>
                                </form>
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
