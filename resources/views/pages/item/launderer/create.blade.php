@extends('Layouts.core')

@section('content')
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content" style="background-color: #F1F3F6">
    @include('Partials.navbaruser')
        <div class="container pt-3">
            <div class="d-sm-flex align-items-center justify-content-between pt-2 mt-1 mb-4">
                <div class="mb-3">
                       Add Item
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
    <div id="content pt-3">
        <form action="/item/add" method="POST">
            @csrf
            <div class="mb-3">
                <input type="hidden" class="form-control" id="toko_id" name="toko_id" value="{{ $data->id }}" aria-describedby="emailHelp" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Price</label>
                <input type="number" class="form-control" name="harga" id="harga">
            </div>
            <div class="mb-3">
                <label for="unit" class="form-label">Unit</label>
                <select class="form-select" id="unit" name="unit" aria-label="Default select example">
                    <option value="Kg">Kg (Kilogram)</option>
                    <option value="Pcs">Pcs (Pieces)</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection
