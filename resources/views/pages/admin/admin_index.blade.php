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
                            <h1 class="font-weight-bold" style="color: black">Good Morning, {{ auth()->user()->username }}</h1>
                        @elseif (localtime(time()) >= 12)
                            <h1 class="font-weight-bold" style="color: black">Good Afternoon, {{ auth()->user()->username }}</h1>
                        @elseif (localtime(time()) >= 16)
                            <h1 class="font-weight-bold" style="color: black">Good Evening, {{ auth()->user()->username }}</h1>
                        @elseif (localtime(time()) >= 18)
                            <h1 class="font-weight-bold" style="color: black">Good Night, {{ auth()->user()->username }}</h1>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content-wrapper" class="d-flex flex-column">
    <div class="container pt-3">
        <div class="card mb-4">
        <h2>Users Registered</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Phone</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->username }}</td>
                        <td>{{ $d->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
        </div>
    </div>
    <div class="container pt-3">
        <h2>Launderer List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Phone</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($dataLaunderer as $d)
                    <tr>
                        <th scope="row">{{ $d->id }}</th>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->username }}</td>
                        <td>{{ $d->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
</div>


    <!-- Scroll to Top Button-->
    @include('Partials.scrolltotop')

    <!-- Logout Modal-->
    @include('Partials.logoutmodal')
@endsection
