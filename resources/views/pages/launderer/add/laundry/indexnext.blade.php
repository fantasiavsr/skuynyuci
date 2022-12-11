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
                        <h1 class="font-weight-bold" style="color: black">Item & Service Laundry</h1>
                    </div>
                    @if ($laundry_item->count() == 0 || $laundry_service->count() == 0)
                        <form action="">
                            <button type="submit" class="btn btn-lg btn-primary" disabled>Create My Laundry</button>
                            <p class="text-center text-danger">add item and service first</p>
                        </form>
                    @else
                        <form action="{{ route('laundry.add.create', ['id' => $toko->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-lg btn-primary">Create My Laundry</button>
                        </form>
                    @endif

                </div>


                {{-- Content Row --}}
                <div class="row">

                    {{-- Add Item Form --}}
                    <div class="col">
                        {{-- <form action="{{ route('ladunry.add.store') }}" method="POST">
                            @csrf --}}
                        {{-- Sub Title --}}
                        <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                            <h1 class="h5 mb-0 text-gray-800 font-weight-bold">Item</h1>
                            <a href="{{ route('laundry.item.add', ['id' => $toko->id]) }}" class="btn btn-primary">Add</a>
                        </div>

                        {{-- Still need fixing alignments --}}
                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            {{-- Card Body --}}
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Item Name</th>
                                                <th>Price</th>
                                                {{-- <th>Edit</th> --}}
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($laundry_item as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->item_type->name }}</td>
                                                    <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                                    {{-- <td>
                                                        <a href="#" class="btn">Edit</a>
                                                    </td> --}}
                                                    <td>
                                                        <form
                                                            action="{{ route('laundry.item.delete', ['id' => $item->id]) }}"
                                                            method="POST" {{-- onclick="return confirm('Are you sure?')" --}}>
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-danger"><i
                                                                    class="fas fa-fw fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        {{-- Sub Title --}}
                        <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-4 mb-4">
                            <h1 class="h5 mb-0 text-gray-800 font-weight-bold">Service</h1>
                            <a href="{{ route('laundry.service.add', ['id' => $toko->id]) }}"
                                class="btn btn-primary">Add</a>
                        </div>

                        {{-- Still need fixing alignments --}}
                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            {{-- Card Body --}}
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Item Name</th>
                                                <th>Price</th>
                                                {{-- <th>Edit</th> --}}
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($laundry_service as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->service->name }}</td>
                                                    <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                                    {{-- <td>
                                                        <a href="#"
                                                            class="btn">Edit</a>
                                                    </td> --}}
                                                    <td>
                                                        {{-- <a href="#" class="btn">Delete</a> --}}
                                                        <form
                                                            action="{{ route('laundry.service.delete', ['id' => $item->id]) }}"
                                                            method="POST" onclick="return confirm('Are you sure?')">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-outline-danger"><i
                                                                    class="fas fa-fw fa-trash"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                        {{-- </form> --}}
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
