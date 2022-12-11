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
                {{-- <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1">
                    <div class="mb-3">
                        <h1 class="font-weight-bold" style="color: black">Admin Page</h1>
                    </div>
                </div> --}}

                {{-- Content Row --}}
                <div class="row">

                    {{-- Col  --}}
                    <div class="col">

                        {{-- Payment --}}
                        {{-- Title --}}
                        <div class="d-sm-flex justify-content-between mt-4 mb-2">
                            <div>
                                <h3 class="h3 mb-0" style="font-weight: 700; color: black">Laundry</h3>
                            </div>
                        </div>
                        {{-- Card --}}
                        <div class="card mb-3" style="width: 100%">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
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
                                            @foreach ($tokoall as $item)
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
