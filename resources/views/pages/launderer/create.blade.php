@extends('Layouts.core')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content" style="background-color: #F1F3F6">
    @include('Partials.navbaruser')
        <div class="container pt-3">
            <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1 mb-4">
                <div class="mb-3">
                       Create Shop
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

<div id="content-wrapper" class="d-flex flex-column">
    <div id="container pt-3">
        <form action="/toko/reg" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Shop Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->id }}" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Open-Hour</label>
                <input type="text" class="form-control" name="open" id="open">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Close</label>
                <input type="text" class="form-control" name="close" id="close">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
