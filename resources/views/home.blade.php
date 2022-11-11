@extends('Layouts.main')

@section('content')
    @include('Partials.navbaruser')

    <div class="main">
        <div class="text-secondary px-4 py-5 text-center">
            <div class="py-5">
                <h1>Welcome, {{ auth()->user()->username }}</h1>
            </div>
        </div>
    </div>

@endsection
