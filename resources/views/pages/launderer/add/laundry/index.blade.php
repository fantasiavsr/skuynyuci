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
                        <h1 class="font-weight-bold" style="color: black">Add Laundry</h1>
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
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif


                                <form action="{{ route('laundry.add.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">


                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Laundry Name</label>
                                            <input value="" placeholder="your laundry name.." type="text"
                                                name="name" class="form-control" autofocus required>
                                        </div>
                                    </div>

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Open Hour</label>
                                            <input value="" placeholder="ex: 07:00" type="text" name="open"
                                                class="form-control" autofocus required>
                                        </div>

                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Close Hour</label>
                                            <input value="" placeholder="ex: 18:00" type="text" name="close"
                                                class="form-control" autofocus required>
                                        </div>
                                    </div>

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Address</label>
                                            <input value="" placeholder="your laundry adddress.." type="text"
                                                name="address" class="form-control" autofocus required>
                                        </div>
                                        <div class="col-sm-2 form-outline mb-4">
                                            <label class="form-label">Distance</label>
                                            <input value="" placeholder="dummy distance.." type="text"
                                                name="distance" class="form-control" autofocus required>
                                        </div>
                                    </div>

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">About</label>
                                            <input value="" placeholder="laundry description" type="text"
                                                name="about" class="form-control" autofocus required>
                                        </div>
                                    </div>

                                    <label class="form-label">Laundry Photo: </label>
                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <input type="file" name="image" class="form-input" autofocus>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('user.index') }}" class="btn btn-block px-5">Cancel</a>
                                        </div>
                                        <div class="col">
                                            {{-- <a class="btn btn-secondary btn-block px-5" href="{{ route('item.order.store') }}">Continue</a> --}}
                                            <button type="submit" class="btn btn-primary btn-block px-5">Next</button>
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
