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
                <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1 mb-4">
                    <div class="mb-3">
                        @if (date('H') >= '05')
                            <h1 class="font-weight-bold" style="color: black">Good Morning, {{ auth()->user()->name }}</h1>
                        @elseif (date('H') >= '12')
                            <h1 class="font-weight-bold" style="color: black">Good Afternoon, {{ auth()->user()->name }}</h1>
                        @elseif (date('H') >= '16')
                            <h1 class="font-weight-bold" style="color: black">Good Evening, {{ auth()->user()->name }}</h1>
                        @elseif (date('H') >= '18')
                            <h1 class="font-weight-bold" style="color: black">Good Night, {{ auth()->user()->name }}</h1>
                        @endif
                    </div>
                    <div class="text-right">
                        <p style="line-height: 0px;">Current Location</p>
                        <h5 class="font-weight-bold" style="line-height: 30px; color:black"><i class="fa fa-map-marker"
                                aria-hidden="true" style="color: #1947BA"></i> Malang, East Java</h5>
                    </div>
                </div>

                <!-- Search Row -->
                <div class="row">
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
                </div>

                <!-- Content Row -->
                <div class="row">

                    {{-- Col --}}
                    <div class="col-xl-8">

                        {{-- Activity Card --}}
                        <div class="card"
                            style="background-color: #1947BA; box-shadow: 0px 16px 40px rgba(25, 71, 186, 0.10);
                            border-radius: 10px;">
                            <div class="card-body text-light">
                                <div class="row">
                                    <div class="col">
                                        <p style="font-weight: 200">Latest Active Order: <span style="">{{ $order->where('user_id', auth()->user()->id)->where('status', 'Ongoing')->sortByDesc('created_at')->first()->order_number }}</span></p>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-between">
                                    <div class="col-xl-7 col-lg-5">
                                        <h3 style="font-weight: 500">
                                            {{ $order->where('user_id', auth()->user()->id)->where('status', 'Ongoing')->sortByDesc('created_at')->first()->toko->name }}
                                        </h3>
                                        <p class="" style="font-weight: 200;">{{ $order->where('user_id', auth()->user()->id)->where('status', 'Ongoing')->sortByDesc('created_at')->first()->created_at }}</p>
                                        <h6>
                                            {{ $order->where('user_id', auth()->user()->id)->where('status', 'Ongoing')->sortByDesc('created_at')->first()->toko->address }}
                                        </h6>
                                        <button class="btn btn-sm btn-outline-light mt-4">
                                            <a class="px-4" href="{{ route('item.order.detailv2', ['order_number' => $order->where('user_id', auth()->user()->id)->where('status', 'Ongoing')->sortByDesc('created_at')->first()->order_number]) }}"
                                                style="text-decoration: none; color: white">view details</a>
                                        </button>
                                    </div>
                                    <div class="col-xl-3 col-lg-9">
                                        <img class="img-fluid" src="{{ asset('img/activity-icon.png') }}" alt=""
                                            style="width: 90%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Title --}}
                        <div class="d-sm-flex justify-content-between mt-4 mb-2">
                            <div>
                                <h3 class="h3 mb-0" style="font-weight: 700; color: black">Nearest Laundry</h3>
                            </div>
                            <div class="text-right">
                                <p style="color:#1947BA">see all</p>
                            </div>
                        </div>

                        {{-- Laundry Card --}}
                        <div class="row row-cols-1 row-cols-md-2 g-3">

                            @foreach ($toko as $item)
                                <div class="col mb-3">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="px-4 pt-2 shadow-custom-lg">
                                                {{-- Butuh Fix Responsive Image biar ga streched --}}
                                                <img class="img-fluid" alt="..."
                                                    @if ($toko_image->where('toko_id', $item->id)->pluck('image')->first() != null) src="{{ asset('img/produk/' .$toko_image->where('toko_id', $item->id)->pluck('image')->first()) }}"
                                                            @else
                                                                src="{{ asset('img/produk/laundry-photo.png') }}" @endif
                                                    style="border-radius: 10pt; height: 200px; width:100%">
                                            </div>

                                            <div class="card-body mx-2 my-2">
                                                <h5 class="card-title" style="font-weight: 700; color: black">
                                                    {{ $item->name }}</h5>
                                                <div class="d-sm-flex justify-content-between">
                                                    <div>
                                                        <p style="color:black"><i class="fa fa-map-marker"
                                                                aria-hidden="true" style="color: #1947BA"></i> 157m</p>
                                                    </div>
                                                    <div class="text-right">
                                                        <h4 style="color:black; font-weight: 600">
                                                            Rp{{ number_format($laundry_item->where('toko_id', $item->id)->pluck('price')->first(),0,',','.') }}
                                                            <span style="font-size: 60%">
                                                                /{{ $item_type->where('id',$laundry_item->where('toko_id', $item->id)->pluck('item_type_id')->first())->pluck('name')->first() }}</span>
                                                        </h4>
                                                    </div>
                                                </div>

                                                <a href="{{ route('item.detail', ['id' => $item->id]) }}"
                                                    class="btn btn-block btn-primary px-4">Detail
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="col mb-3">
                                <div class="card">
                                    <div class="row g-0">
                                        <div class="px-4 pt-2 shadow-custom-lg">
                                            <img src="{{ asset('img/item-1.jpg') }}" class="img-fluid" alt="..."
                                                style="border-radius: 10pt">
                                        </div>

                                        <div class="card-body mx-2 my-2">
                                            <h5 class="card-title" style="font-weight: 700; color: black">Fresh Laundry</h5>
                                            <div class="d-sm-flex justify-content-between">
                                                <div>
                                                    <p style="color:black"><i class="fa fa-map-marker" aria-hidden="true"
                                                            style="color: #1947BA"></i> 157m</p>
                                                </div>
                                                <div class="text-right">
                                                    <h4 style="color:black; font-weight: 600">25.000 <span
                                                            style="font-size: 60%">
                                                            /pcs</span></h4>
                                                </div>
                                            </div>

                                            <a href="{{ route('item.detailtest') }}" class="btn btn-block btn-primary px-4">Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>

                    </div>

                    {{-- Col --}}
                    <div class="col">

                        {{-- History --}}

                        {{-- Title --}}
                        <div class="d-sm-flex justify-content-between mb-2">
                            <div>
                                <h3 class="h3 mb-0" style="font-weight: 700; color: black">History</h3>
                            </div>
                            <div class="text-right">
                                <p style="color:#1947BA">see all</p>
                            </div>
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
                                                <div class="mt-4">
                                                    <a href="{{ route('item.order.detailv2', ['order_number' => $item->order_number]) }}"
                                                        class="btn btn-sm btn-block btn-primary">
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

        </div>

        <!-- Scroll to Top Button-->
        @include('Partials.scrolltotop')

        <!-- Logout Modal-->
        @include('Partials.logoutmodal')
    @endsection
