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
            @include('Partials.navbaradmin')
            <!-- Begin Page Content -->
            <div class="container pt-3">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1">
                    <div class="mb-3">
                        <h1 class="font-weight-bold" style="color: black">Order {{ $order->order_number }}</h1>
                    </div>
                </div>


                {{-- Content Row --}}
                <div class="row">

                    {{-- Add Item Form --}}
                    <div class="col">

                        {{-- Sub Title --}}
                        <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                            <h1 class="h5 mb-0 text-gray-800 font-weight-bold">Edit Order</h1>
                        </div>

                        {{-- Still need fixing alignments --}}
                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            {{-- Card Body --}}
                            <div class="card-body">
                                <form action="{{ route('admin.payment.store') }}" method="POST">
                                    @csrf

                                    <input type="hidden" id="order_id" name="order_id" value="{{ $order->id }}">
                                    <input type="hidden" id="user_id" name="user_id" value="{{ $order->user_id }}">
                                    <input type="hidden" id="toko_id" name="toko_id" value="{{ $order->toko->id }}">

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Order Number</label>
                                            <input value="{{ $order->order_number }}" type="text" name="order_number"
                                                class="form-control" autofocus disabled>
                                        </div>
                                    </div>

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Customer</label>
                                            <input value="{{ $order->user->name }}" type="text" name="customer"
                                                class="form-control" autofocus disabled>
                                        </div>

                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Laundry</label>
                                            <input value="{{ $order->toko->name }}" type="text" name="toko"
                                                class="form-control" autofocus disabled>
                                        </div>
                                    </div>

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Total Item</label>
                                            <input value="{{ $order->total_item }}" type="text" name="customer"
                                                class="form-control" autofocus disabled>
                                        </div>

                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Total Price</label>
                                            <input value="{{ $order->total_price }}" type="text" name="toko"
                                                class="form-control" autofocus disabled>
                                        </div>

                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Payment</label>
                                            <input value="{{ $order->payment_method }}" type="text" name="toko"
                                                class="form-control" autofocus disabled>
                                        </div>
                                    </div>

                                    <div class="row d-flex">

                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Service Status</label>
                                            <select type="text" name="service_status" class="form-control" autofocus disabled>
                                                <option value="Not yet started"
                                                    @if ($order->service_status == 'Not yet started') selected @endif>Not yet started
                                                </option>
                                                <option value="Washing" @if ($order->service_status == 'Washing') selected @endif>
                                                    Washing</option>
                                                <option value="Cleaning" @if ($order->service_status == 'Cleaning') selected @endif>
                                                    Cleaning</option>
                                                <option value="Drying" @if ($order->service_status == 'Drying') selected @endif>
                                                    Drying</option>
                                                <option value="Ironing" @if ($order->service_status == 'Ironing') selected @endif>
                                                    Ironing</option>
                                                <option value="Folding" @if ($order->service_status == 'Folding') selected @endif>
                                                    Folding</option>
                                                <option value="Deliver" @if ($order->service_status == 'Deliver') selected @endif>
                                                    Deliver</option>
                                                <option value="Done" @if ($order->service_status == 'Done') selected @endif>
                                                    Done</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Order Status</label>
                                            <select type="text" name="status" class="form-control" autofocus>
                                                <option value="Waitting for Payment"
                                                    @if ($order->status == 'Waitting for Payment') selected @endif>Waitting for Payment
                                                </option>
                                                <option value="Ongoing"
                                                    @if ($order->status == 'Ongoing') selected @endif>Ongoing
                                                </option>
                                                <option value="Pending"
                                                    @if ($order->status == 'Pending') selected @endif>Pending
                                                </option>
                                                <option value="Completed"
                                                    @if ($order->status == 'Completed') selected @endif>Completed
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('admin.payment') }}"
                                                class="btn btn-block px-5">Cancel</a>
                                        </div>
                                        <div class="col">
                                            {{-- <a class="btn btn-secondary btn-block px-5" href="{{ route('item.order.store') }}">Continue</a> --}}
                                            <button type="submit" class="btn btn-primary btn-block px-5">Update</button>
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
