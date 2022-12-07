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

                    {{-- Add Item Form --}}
                    <div class="col">

                        {{-- Sub Title --}}
                        <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                            <h1 class="h5 mb-0 text-gray-800 font-weight-bold">Add Item</h1>
                        </div>

                        {{-- Still need fixing alignments --}}
                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            {{-- Card Body --}}
                            <div class="card-body">
                                <form action="{{ route('item.order.store') }}" method="POST">
                                    @csrf

                                    <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Service</label>
                                            <select type="text" name="item_type" class="form-control" autofocus required>
                                                @foreach ($laundry_service as $item)
                                                    <option value="{{ $item->id }}">{{ $item->service->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Item</label>
                                            <select type="text" name="item_type" class="form-control" autofocus required>
                                                @foreach ($laundry_item as $item)
                                                    <option value="{{ $item->id }}">{{ $item->item_type->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Quantity</label>
                                            <input type="text" name="quantity" class="form-control" autofocus>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="row">
                                        <div class="col">
                                            <a href="#" class="btn btn-block px-5">Cancel</a>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-primary btn-block px-5">Continue</button>
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
