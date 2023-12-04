@extends('user/layout')
@section('content')
    <section class="container">
        <!-- breadcrumb -->
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"
                        class="text-decoration-none text-secondary">{{ $data->category == 1 ? 'Makanan' : 'Minuman' }}</a>
                </li>
                <li class="breadcrumb-item text-dark active " aria-current="page">{{ $data->name }}</li>
            </ol>
        </nav>
        <!-- end breadcrumb -->
        <div class="row mb-5">
            <div class="col-7">
                <div class="card p-5 border border-0" style="background-color: #f2f0ea; width: 90%;">
                    <img src="{{ $data->picture }}" class="img-fluid">
                </div>
            </div>
            <div class="col-5">
                <p class="text-secondary">{{ $data->category == 1 ? 'Makanan' : 'Minuman' }}</p>
                <h3><b>{{ $data->name }}</b></h3>
                <p><small>{{ $data->description }}</small></p>
                <h1 class="my-5"><b>IDR {{ number_format($data->price, 0, '', '.') }}</b></h1>
                <p>Variant</p>
                <form action="/add/cart" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">
                    @foreach ($variant as $item)
                        <input type="radio" class="btn-check" name="variant" id="{{ $item }}"
                            value="{{ $item }}" autocomplete="off" required>
                        <label class="btn btn-outline-dark me-2" for="{{ $item }}">{{ $item }}</label>
                    @endforeach
                    <div class="my-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" max="{{$data->stock}}" class="form-control" id="amount" name="amount" style="width: 5rem;"
                            value="1" required>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="note here" id="note" name="note"></textarea>
                        <label for="note">Note</label>
                    </div>
                    <button class="btn btn-dark p-3 mt-5" type="submit" style="width: 100%;"><i
                            class="bi bi-basket2-fill me-2"></i>Add To Cart</button>
                </form>
                <p class="mt-1">
                    <small"><i class="bi bi-truck me-2"></i> Free delivery on orders over IDR 30.000</small>
                </p>
            </div>
        </div>

    </section>
@endsection
