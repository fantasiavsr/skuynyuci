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
                        <h1 class="font-weight-bold" style="color: black">{{ $user->Name }}</h1>
                    </div>
                </div>


                {{-- Content Row --}}
                <div class="row">

                    {{-- Add Item Form --}}
                    <div class="col">

                        {{-- Sub Title --}}
                        <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                            <h1 class="h5 mb-0 text-gray-800 font-weight-bold">Edit User</h1>
                        </div>

                        {{-- Still need fixing alignments --}}
                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            {{-- Card Body --}}
                            <div class="card-body">
                                <form action="{{ route('admin.user.edit.store') }}" method="POST">
                                    @csrf

                                    <input type="hidden" id="id" name="id" value="{{ $thisuser->id }}">

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Name</label>
                                            <input value="{{ $thisuser->name }}" type="text" name="name"
                                                class="form-control" autofocus>
                                        </div>
                                    </div>

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Username</label>
                                            <input value="{{ $thisuser->username }}" type="text" name="username"
                                                class="form-control" autofocus>
                                        </div>

                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Email</label>
                                            <input value="{{ $thisuser->email }}" type="text" name="email"
                                                class="form-control" autofocus>
                                        </div>
                                    </div>

                                    <div class="row d-flex">
                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">Phone</label>
                                            <input value="{{ $thisuser->phone }}" type="text" name="phone"
                                                class="form-control" autofocus>
                                        </div>
                                    </div>

                                    <div class="row d-flex">

                                        <div class="col-sm form-outline mb-4">
                                            <label class="form-label">level</label>
                                            <select type="text" name="level" class="form-control" autofocus>
                                                <option value="Admin"
                                                    @if ($thisuser->level == 'Admin') selected @endif>Admin
                                                </option>
                                                <option value="Customer"
                                                    @if ($thisuser->level == 'Customer') selected @endif>Customer
                                                </option>
                                                <option value="Launderer"
                                                    @if ($thisuser->level == 'Launderer') selected @endif>Launderer
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Submit button -->
                                    <div class="row">
                                        <div class="col">
                                            <a href="{{ route('admin.user') }}"
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
