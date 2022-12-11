@extends('Layouts.core')

@section('content')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content" style="background-color: #F1F3F6">
            @include('Partials.navbaradmin')

            <!-- Begin Page Content -->
            <div class="container pt-3">

                {{-- Content Row --}}
                <div class="row">

                    {{-- Col  --}}
                    <div class="col">

                        {{-- Payment --}}
                        {{-- Title --}}
                        <div class="d-sm-flex justify-content-between mt-4 mb-2">
                            <div>
                                <h3 class="h3 mb-0" style="font-weight: 700; color: black">Order</h3>
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
                                                <th>Service Status</th>
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
                                                    <td>{{ $item->service_status }}</td>
                                                    <td>{{ $item->payment_method }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('admin.order.edit', ['id' => $item->id]) }}" class="btn">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form
                                                            action="{{ route('admin.order.delete', ['id' => $item->id]) }}"
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
