@extends('Layouts.core')

@section('content')
    @include('Partials.navbaruser')

    <div class="main" style="background-color: #F1F3F6">
        <div class="text-secondary px-4 py-5 text-center">
            <div class="py-5">
                <h1>Good Morning, {{ auth()->user()->username }}</h1>
            </div>
        </div>
    </div>

@endsection
