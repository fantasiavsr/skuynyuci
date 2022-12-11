@extends('Layouts.core')

@section('content')
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
                        <h1 class="font-weight-bold" style="color: black">Admin Page</h1>
                    </div>
                </div>

                {{-- Content Row --}}
                <div class="row">

                    {{-- Col  --}}
                    <div class="col">

                        {{-- Laundry --}}
                        {{-- Title --}}
                        <div class="d-sm-flex justify-content-between mt-4 mb-2">
                            <div>
                                <h3 class="h3 mb-0" style="font-weight: 700; color: black">Laundry</h3>
                            </div>
                        </div>
                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            {{-- Card Body --}}
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Launderer</th>
                                                <th>Open</th>
                                                <th>Close</th>
                                                <th>Address</th>
                                                <th>About</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($toko as $item)
                                                <tr>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->open }}</td>
                                                    <td>{{ $item->close }}</td>
                                                    <td>{{ $item->address }}</td>
                                                    <td>{{ $item->about }}</td>
                                                    <td>
                                                        <a href="{{ route('laundry.detail', ['id' => $item->id]) }}" class="btn">Detail</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- User --}}
                        {{-- Title --}}
                        <div class="d-sm-flex justify-content-between mt-4 mb-2">
                            <div>
                                <h3 class="h3 mb-0" style="font-weight: 700; color: black">User</h3>
                            </div>
                        </div>
                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Level</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($userall as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>{{ $item->phone }}</td>
                                                    <td>{{ $item->level }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>
                                                        <a href="#" class="btn">Edit</a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- Payment --}}
                        {{-- Title --}}
                        <div class="d-sm-flex justify-content-between mt-4 mb-2">
                            <div>
                                <h3 class="h3 mb-0" style="font-weight: 700; color: black">Payment</h3>
                            </div>
                        </div>
                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Order Number</th>
                                                <th>Customer</th>
                                                <th>Laundry</th>
                                                <th>Total Item</th>
                                                <th>Total Price</th>
                                                <th>Status</th>
                                                <th>Payment</th>
                                                <th>Date</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderall->where('status', '!=', 'Draft') as $item)
                                                <tr>
                                                    <td>{{ $item->order_number }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->toko->name }}</td>
                                                    <td>{{ $item->total_item }}</td>
                                                    <td>{{ $item->total_price }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->payment_method }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.payment.edit', ['id' => $item->id]) }}" class="btn">Edit</a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
