@extends("Layouts.core")

@section('content')
<div class="content-wrapper" class="d-flex flex-column">
    <div id="content" style="background-color: #F1F3F6">
        @include('Partials.navbaruser')
        <div class="container pt-3">
            <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1 mb-4">
                    <div class="mb-3">
                    <h1 class="font-weight-bold" style="color: black">{{ $data->name }}</h1>
                    </div>
                    <div class="text-right">
                        <p style="line-height: 0px;">Laundry Location</p>
                        <h5 class="font-weight-bold" style="line-height: 30px; color:black"><i class="fa fa-map-marker"
                                aria-hidden="true" style="color: #1947BA"></i> {{ $data->address }}</h5>
                    </div>
            </div>
        </div>
    </div>
</div>
<div id="content-wrapper" class="d-flex flex-columns">
    <div class="container pt-3">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center pt-5">
                    @foreach ($item as $i)
                        <a href="#">
                                <button type="button"
                                    data-toggle="tooltip" data-placement="top" title="{{ $i->harga }} /{{$i->unit}}" class="btn rounded-pill btn-outline-primary px-4 me-sm-3">{{ $i->name }}</button>
                        </a>
                    @endforeach
                </div>
                <h3>About</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eligendi odit a libero? Rem consectetur harum illum tenetur eaque dolores nisi dicta minus veritatis eligendi porro fugit perspiciatis iusto illo culpa, perferendis, atque sed iure maiores.</p>
                <hr class="hr">
                @foreach ($detail as $d)
                    <h4>Email</h4>
                    <p>{{ $d->email }}</p>
                    <h4>Phone</h4>
                    <p>{{ $d->phone }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Scroll to Top Button-->
@include('Partials.scrolltotop')

<!-- Logout Modal-->
@include('Partials.logoutmodal')
@endsection
