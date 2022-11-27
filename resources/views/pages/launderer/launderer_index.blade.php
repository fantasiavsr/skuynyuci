@extends('Layouts.core')

@section('content')
{{-- <div class="main" style="background-color: #F1F3F6">
        <div class="text-secondary px-4 py-5 text-center">
            <div class="py-5">
                <h1>Good Morning, {{ auth()->user()->level }}</h1>
            </div>
        </div>
    </div> --}}
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content" style="background-color: #F1F3F6">
    @include('Partials.navbaruser')
        <div class="container pt-3">
            <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1 mb-4">
                <div class="mb-3">
                        @if (localtime(time()) >= 05)
                            <h1 class="font-weight-bold" style="color: black">Good Morning, {{ auth()->user()->name }}</h1>
                        @elseif (localtime(time()) >= 12)
                            <h1 class="font-weight-bold" style="color: black">Good Afternoon, {{ auth()->user()->name }}</h1>
                        @elseif (localtime(time()) >= 16)
                            <h1 class="font-weight-bold" style="color: black">Good Evening, {{ auth()->user()->name }}</h1>
                        @elseif (localtime(time()) >= 18)
                            <h1 class="font-weight-bold" style="color: black">Good Night, {{ auth()->user()->name }}</h1>
                        @endif
                </div>
                <div class="text-right">
                    <p style="line-height: 0px;">Laundry Location</p>
                    <h5 class="font-weight-bold" style="line-height: 30px; color:black"><i class="fa fa-map-marker"
                                aria-hidden="true" style="color: #1947BA"></i> </h5>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content-wrapper" class="d-flex flex-columns">
    <div class="container pt-3">
        <h2>Your Laundry Profile</h2>
        <button class="btn"><a href="/toko/reg">Create Shop</a></button>
        <div class="card mb-4">
            <div class="card-body">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nama Laundry</th>
                    <th scope="col">Open Hour</th>
                    <th scope="col">Close</th>
                    <th scope="col">Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                <tr>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->open }}</td>
                    <td>{{ $d->close }}</td>
                    <td>{{ $d->address }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
            </div>
        </div>
    </div>
</div>


    <!-- Scroll to Top Button-->
    @include('Partials.scrolltotop')

    <!-- Logout Modal-->
    @include('Partials.logoutmodal')
@endsection
