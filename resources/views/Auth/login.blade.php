@extends('Layouts.main')
@include('Partials.navbar2')

@section('content')
    <div class="pt-5 pb-5" style="background-color: #F9FAFC">
        <div class="container">
            {{-- <a href="/home"><img src="{{ asset('img/gv-text-dark.png') }}" class="img-fluid pb-5" alt=""
                style="width: 150px"></a> --}}
            <a href="/">
                <button class="btn"><i class="bi bi-chevron-left pe-2"></i>back</button>
            </a>
        </div>
        <div class="container" style="">
            <div class="row pb-5">
                <div class="col pt-5 pb-5 px-4 text-dark">
                    <div class="text-dark">
                        <h1 class="fw-normal" style="color: #1947BA">Welcome
                            Back</h1>
                            <p>We’re so excited to see you again!</p>
                    </div>
                    <div class="col-md-7 ps-4 pt-5">
                        <img class="img-fluid w-100" src="{{ asset('img/login-image1.png') }}" alt="">
                    </div>
                </div>
                <div class="col-md-4 pt-5 pb-5 px-4 text-dark" {{-- style="background-color: #ffffff" --}}>
                    {{-- <div class="text-dark">
                        <h1 class="mb-5 fw-bold" style="color: #4FBEAB">Login</h1>
                    </div> --}}

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/login" method="POST">
                        @csrf

                        <div class="form-outline mb-4">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" autocomplete="off"
                                autofocus required>
                        </div>

                        <div class="form-outline mb-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" id="password" autocomplete="off" class="form-control"
                                required>
                        </div>

                        {{-- <input type="hidden" id="role" name="role" value="0"> --}}
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-lg mt-4 px-5 mb-4 text-light shadow-custom-green"
                            style="background-color: #1947BA; width: 100%">Login</button>

                        <!-- Register buttons -->
                        <div class="text-center">
                            <p>Not a member? <a href="{{ route('register') }}" class=" fw-bold"
                                    style="color: #1947BA">Register</a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <br><br>
    </div>
@endsection
