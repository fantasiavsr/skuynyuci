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
                {{-- <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1 mb-4">
                    <div class="mb-3">
                        <h1 class="font-weight-bold" style="color: black">Available Laundry</h1>
                    </div>
                    <div class="text-right">
                        <p style="line-height: 0px;">Current Location</p>
                        <h5 class="font-weight-bold" style="line-height: 30px; color:black"><i class="fa fa-map-marker"
                                aria-hidden="true" style="color: #1947BA"></i> Malang, East Java</h5>
                    </div>
                </div> --}}

                <!-- Search Row -->
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small"
                                                placeholder="Find the nearest laundry" aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- Content Row -->
                <div class="row">

                    {{-- Col --}}
                    <div class="col">

                        {{-- Title --}}
                        <div class="d-sm-flex justify-content-between mt-4 mb-2">
                            <div>
                                <h3 class="h3 mb-3" style="font-weight: 700; color: black">History</h3>
                            </div>
                            {{-- <div class="text-right">
                                <p style="color:#1947BA">see all</p>
                            </div> --}}
                        </div>

                        {{-- History Card --}}
                        @if ($order->count() > 0)
                            @foreach ($order as $item)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col">
                                                        <h5 style="font-weight: 800">{{ $item->toko->name }}</h5>
                                                    </div>
                                                    <div class="col text-right">
                                                        @if ($item->status == 'Waitting for Payment')
                                                            <span class="badge badge-danger">Waitting for
                                                                Payment</span>
                                                        @elseif ($item->status == 'Ongoing')
                                                            <span class="badge badge-primary">Ongoing</span>
                                                        @elseif ($item->status == 'Completed')
                                                            <span class="badge badge-success">Completed</span>
                                                        @elseif ($item->status == 'cancel')
                                                            <span class="badge badge-warning">Pending</span>
                                                        @endif
                                                        {{-- <span class="badge badge-warning">
                                                            {{ $item->status }}
                                                        </span> --}}
                                                    </div>
                                                </div>

                                                <p>{{ $item->created_at->format('d F, Y/H:iA') }}</p>
                                                <span class="badge border border-primary" style="">
                                                    <div class="">
                                                        <i class="fa fa-circle text-primary"></i>
                                                        {{ $item->service_status }}
                                                    </div>
                                                </span>
                                                <div class="mt-4 float-right">
                                                    <a href="{{ route('item.order.detailv2', ['order_number' => $item->order_number]) }}"
                                                        class="btn btn-sm btn-primary px-5">
                                                        Detail
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <h5 style="font-weight: 800">No history available.</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                </div>

            </div>
            <br><br><br>
            <br><br><br>
            <br><br><br>
            <br><br><br>
        </div>

        <!-- Scroll to Top Button-->
        @include('Partials.scrolltotop')

        <!-- Logout Modal-->
        @include('Partials.logoutmodal')
    @endsection
