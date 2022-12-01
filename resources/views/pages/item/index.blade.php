@extends("Layouts.core")

@section('content')
<div class="content-wrapper" class="d-flex flex-column">
    <div id="content" style="background-color: #F1F3F6">
        @include('Partials.navbar')
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
@endsection
