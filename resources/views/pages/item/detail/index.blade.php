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
                        <h1 class="font-weight-bold" style="color: black">{{ $toko->name }}</h1>
                    </div>
                    <div class="text-right">
                        <p style="line-height: 0px;">Location</p>
                        <h5 class="font-weight-bold" style="line-height: 30px; color:black"><i class="fa fa-map-marker"
                                aria-hidden="true" style="color: #1947BA"></i>{{ $toko->address }}</h5>
                    </div>
                </div>

                <!-- Content -->
                <div class="text-center mb-5">
                    <img src="{{ asset('img/produk/'.$toko_image->image) }}" class="img-fluid mt-2 mb-5 shadow-custom-lg" alt="" style="width: 700px; border-radius: 25px">
                    <div class="d-flex justify-content-center" style="gap: 10px">
                        @foreach ($toko_category as $item)
                            <button class="btn rounded-pill btn-outline-primary px-4 me-sm-3">{{ $item->name }}</button>
                        @endforeach

                        {{-- <button class="btn rounded-pill btn-outline-primary px-4 me-sm-3">Wash</button>
                        <button class="btn rounded-pill btn-outline-primary px-4 me-sm-3">Iron</button>
                        <button class="btn rounded-pill btn-outline-primary px-4 me-sm-3">Dry Clean</button>
                        <button class="btn rounded-pill btn-outline-primary px-4 me-sm-3">+2</button> --}}
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="card mb-4" style="width:100%">
                            <div class="card-body">
                                <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1">
                                    <div class="col-md-9">
                                        <div class="">
                                            <a href="#" class="btn btn-light">About</a>
                                            <a href="#" class="btn btn-light">Service</a>
                                            <a href="#" class="btn btn-light">Review</a>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <a href="{{ route('item.order.detailtest') }}" class="btn btn-lg btn-primary">
                                            Order | 25.00/pcs
                                        </a>
                                    </div>
                                </div>

                                <div class="px-3">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <h5 class="font-weight-bold pt-3">
                                                Fresh Laundry is an Online Laundry Service Provider. We provide laundry, dry
                                                cleaning, and steam press services. Custmers can schedule a laundry pick-up
                                                through our App/Website or can also drop off laundry at our place.
                                            </h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col">
                                            <p class="font-weight-bold">email</p>
                                            <p>freshlaundry@mail.com</p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-bold">phone</p>
                                            <p>+62 838-4545-3232</p>
                                        </div>
                                        <div class="col">
                                            <p class="font-weight-bold">social media</p>
                                            <p>@freshlaundry</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
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
