@extends('Layouts.main')

@section('content')
    @include('Partials.navbar')

    <div class="main">

        {{-- HERO --}}
        <div class="text-secondary px-4 py-5 text-center" style="background-color: #F1F3F6">
            <div class="py-5">
                <img src="img/logo-only.png" class="img-fluid pb-5" alt="" style="width: 200px">
                <h1 class="display-5 fw-bold py-4" style="color: #1947BA">Why Skuynyuci?</h1>
                <div class="col-lg-6 mx-auto">
                    <p class="fs-5 mb-4" style="color: #1947BA">
                        SkuyNyuci merupakan sebuah platform penyedia jasa laundry yang menghubungkan konsumen dan penyedia
                        jasa.
                        Desain aplikasi yang simple dan modern agar mudah digunakan oleh masyarakat umum. Serta
                        menghubungkan konsumen dan penyedia jasa laundry.
                    </p>
                    <br>
                    <div class="d-grid gap-2 d-sm-flex justify-content-sm-center pt-5">
                        <a href="#">
                            <button type="button"
                                class="btn  rounded-pill btn-outline-primary px-4 me-sm-3">Reliable</button>
                        </a>
                        <a href="#">
                            <button type="button" class="btn rounded-pill btn-outline-primary px-4 me-sm-3">Simple</button>
                        </a>
                        <a href="#">
                            <button type="button" class="btn rounded-pill btn-outline-primary px-4 me-sm-3">Clean</button>
                        </a>
                        <a href="#">
                            <button type="button" class="btn rounded-pill btn-outline-primary px-4 me-sm-3">Modern</button>
                        </a>
                        {{-- <a href="/courseList">
                            <button type="button" class="btn btn-lg rounded-pill btn-dark px-4">Course List</button>
                        </a> --}}
                    </div>
                </div>
            </div>
            {{-- <div class="ratio ratio-16x9">
                <iframe class="" src="uploads/1. TI-2A.pdf" allowfullscreen></iframe>
            </div> --}}
            <br>
        </div>

        {{-- Section --}}
        <div class="px-4 py-5" style="background-color: #FFFFFF">
            <br><br>

            <div class="container pt-5 pb-5">

                <div class="justify-content-center">
                    {{-- <div class="card-group gap-4"> --}}
                    <div class="d-grid gap-5 d-sm-flex justify-content-sm-center pt-4">

                        <div class="col-md-4 pe-1">
                            <img class="img-fluid w-100" src="{{ asset('img/home-1.png') }}" alt="">
                        </div>
                        <div class="col-md-5 ps-4">
                            <h3 class="col-md-11 display-6 fw-bold text-dark pb-2">Pesan Laundry Favoritmu dengan Cepat.
                            </h3>
                            <p class="fs-5 fw-light mb-4 text-dark">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Maecenas aliquam nec lorem ac egestas. Sed congue, nulla ac maximus viverra, justo sapien
                                feugiat est, sed fringilla mi enim eget odio. Nulla facilisi.
                            </p>
                        </div>

                    </div>

                </div>

            </div>

            <br><br><br>
        </div>

        {{-- Section --}}
        <div class="px-4 py-5" style="background-color: #F1F3F6">
            <br><br>

            <div class="container pt-5 pb-5">

                <div class="justify-content-center">
                    {{-- <div class="card-group gap-4"> --}}
                    <div class="d-grid gap-5 d-sm-flex justify-content-sm-center pt-4">

                        <div class="col-md-5 pe-1">
                            <h3 class="col-md-9 display-6 fw-bold text-dark pb-2">Tracking Pesananan Dengan Nyaman.</h3>
                            <p class="fs-5 fw-light mb-4 text-dark">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Maecenas aliquam nec lorem ac egestas. Sed congue, nulla ac maximus viverra, justo sapien
                                feugiat est, sed fringilla mi enim eget odio. Nulla facilisi.
                            </p>
                        </div>
                        <div class="col-md-4 ps-4">
                            <img class="img-fluid w-100" src="{{ asset('img/home-2.png') }}" alt="">
                        </div>

                    </div>

                </div>

            </div>

            <br><br><br>
        </div>

        {{-- Section --}}
        <div class="px-4 py-5" style="background-color: #EDEFF5">
            <br>

            <div class="container pt-5 pb-5 text-center justify-content-center px-5">

                <div class="container row justify-content-center text-center pb-4">
                    <h2 class="display-6 fw-bold">Easy-to Use and Reliable Apps</h2>
                    <p class="fs-5 fw-light text-dark">Aplikasi didesain senyaman mungkin bagi pengguna
                    </p>
                </div>

                <div class="row">
                    <div class="col"></div>
                    <div class="col-md-12" style="width: 100%">
                        <div class="justify-content-center text-center pb-5">
                            <img class="img-fluid" src="{{ asset('img/home-3.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col"></div>
                </div>

                <div class="row justify-content-center text-center pt-3">
                    <h2 class="fw-bold">Ready to start your order?</h2>
                </div>

                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center pt-4 text-center">
                    <a href="/register/launderer">
                        <button type="button"
                            class="btn btn-md rounded-pill px-4 py-3 me-sm-3 text-light fw-bold shadow-custom-green   "
                            style="background-color: #1947BA;">Join Now For Free</button>
                    </a>

                </div>

            </div>


        </div>

    </div>

    @include('Partials.footer')
@endsection
