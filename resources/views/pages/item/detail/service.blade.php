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
                                aria-hidden="true" style="color: #1947BA"></i> {{ $toko->address }}</h5>
                    </div>
                </div>

                <!-- Content -->
                <div class="text-center mb-5">
                    @if (isset($toko_image))
                        <img src="{{ asset('img/produk/' . $toko_image->image) }}"
                            class="img-fluid mt-2 mb-5 shadow-custom-lg" alt=""
                            style="width: 700px; border-radius: 25px">
                    @else
                        <img src="{{ asset('img/produk/laundry-photo.png') }}" class="img-fluid mt-2 mb-5 shadow-custom-lg"
                            alt="" style="width: 700px; border-radius: 25px">
                    @endif
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
                                            <a href="{{ route('item.detail', ['id' => $toko->id]) }}"
                                                class="btn btn-light ">About</a>
                                            <a href="{{ route('item.detailservice', ['id' => $toko->id]) }}"
                                                class="btn btn-light active">Service</a>
                                            <a href="#" class="btn btn-light">Review</a>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="btn-group">
                                            <a href="{{ route('item.order.detail', ['id' => $toko->id, 'order_number' => $order_number]) }}"
                                                class="btn btn-lg btn-primary text-right"
                                                style="border-radius: 10px 0px 0px 10px">
                                                <span style="">
                                                    Rp{{ number_format($laundry_item->where('toko_id', $toko->id)->pluck('price')->first(),0,',','.') }}
                                                    <span style="font-size: 60%">
                                                        /{{ $item_type->where('id',$laundry_item->where('toko_id', $toko->id)->pluck('item_type_id')->first())->pluck('name')->first() }}</span>
                                                </span>
                                            </a>
                                            <button style="border-radius: 0px 10px 10px 0px"
                                                class="btn btn-primary dropdown-toggle-split" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <span class="text-right" style="font-size: 64%">
                                                    + service tax
                                                </span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                @foreach ($laundry_service as $item)
                                                    <a class="dropdown-item" href="#"
                                                        onclick="javascript:return false;">{{ $item->service->name }} / +
                                                        Rp{{ number_format($item->price, 0, ',', '.') }}</a>
                                                @endforeach

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="px-3">
                                    <div class="row">
                                        <div class="col-md-9 pt-3 pb-2">
                                            <h5>Service</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($laundry_service as $item)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item->service->name }}
                                                                </td>
                                                                <td>Rp. {{ number_format($item->price) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-9 pt-3 pb-2">
                                            <h5>Item</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable2" width="100%"
                                                    cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($laundry_item as $item2)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $item2->item_type->name }}
                                                                </td>
                                                                <td>Rp. {{ number_format($item2->price) }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
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
