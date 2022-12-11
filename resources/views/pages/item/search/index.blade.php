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
                    {{-- <div class="mb-3">
                        @if (date('H') >= '05')
                            <h1 class="font-weight-bold" style="color: black">Good Morning, {{ auth()->user()->name }}</h1>
                        @elseif (date('H') >= '12')
                            <h1 class="font-weight-bold" style="color: black">Good Afternoon, {{ auth()->user()->name }}</h1>
                        @elseif (date('H') >= '16')
                            <h1 class="font-weight-bold" style="color: black">Good Evening, {{ auth()->user()->name }}</h1>
                        @elseif (date('H') >= '18')
                            <h1 class="font-weight-bold" style="color: black">Good Night, {{ auth()->user()->name }}</h1>
                        @endif
                    </div> --}}
                    <div class="mb-3">
                        <h1 class="font-weight-bold" style="color: black">Available Laundry</h1>
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
                    <div class="col">

                        {{-- Title --}}
                        <div class="d-sm-flex justify-content-between mt-4 mb-2">
                            <div>
                                <h3 class="h3 mb-3" style="font-weight: 700; color: black">Result</h3>
                            </div>
                            {{-- <div class="text-right">
                                <p style="color:#1947BA">see all</p>
                            </div> --}}
                        </div>

                        {{-- Laundry Card --}}
                        <div class="row row-cols-1 row-cols-md-1 g-3">

                            @foreach ($resulttoko as $item)
                                <div class="col mb-3">
                                    <div class="card">
                                        <div class="row g-0">
                                            <div class="pl-4 py-3 shadow-custom-lg">
                                                {{-- Butuh Fix Responsive Image biar ga streched --}}
                                                <img class="img-fluid" alt="..."
                                                    @if ($toko_image->where('toko_id', $item->id)->pluck('image')->first() != null) src="{{ asset('img/produk/' .$toko_image->where('toko_id', $item->id)->pluck('image')->first()) }}"
                                                            @else
                                                                src="{{ asset('img/produk/laundry-photo.png') }}" @endif
                                                    style="border-radius: 10pt; height:170px ; width:270px">
                                            </div>

                                            <div class="card-body mx-2 my-0">
                                                <div class="d-sm-flex justify-content-between">
                                                    <h5 class="card-title" style="font-weight: 700; color: black">
                                                        {{ $item->name }}</h5>
                                                    <div class="text-right">
                                                        <h4 style="color:black; font-weight: 600">
                                                            Rp{{ number_format($laundry_item->where('toko_id', $item->id)->pluck('price')->first(),0,',','.') }}
                                                            <span style="font-size: 60%">
                                                                /{{ $item_type->where('id',$laundry_item->where('toko_id', $item->id)->pluck('item_type_id')->first())->pluck('name')->first() }}</span>
                                                        </h4>
                                                    </div>
                                                </div>

                                                <div class="d-sm-flex justify-content-between">
                                                    <div>
                                                        <p style="color:black"><i class="fa fa-map-marker"
                                                                aria-hidden="true" style="color: #1947BA"></i>
                                                            {{ $item->distance }}m</p>
                                                    </div>
                                                    <div>
                                                        <p>{{ $item->order_count }} order reached</p>
                                                    </div>
                                                </div>

                                                <div class="d-sm-flex mb-3" style="gap: 5px">
                                                    @foreach ($laundry_category->where('toko_id', $item->id) as $item2)
                                                        <span class="badge" style="border: 1px solid #1947BA">
                                                            {{ $item2->name }}
                                                        </span>
                                                    @endforeach
                                                </div>

                                                <div class="d-sm-flex text-right float-right">
                                                    <a href="{{ route('item.detail', ['id' => $item->id]) }}"
                                                        class="btn btn-primary px-4">Detail
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Scroll to Top Button-->
        @include('Partials.scrolltotop')

        <!-- Logout Modal-->
        @include('Partials.logoutmodal')
    @endsection
