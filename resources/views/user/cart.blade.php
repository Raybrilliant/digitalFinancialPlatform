@extends('user/layout')
@section('content')
    <section class="container">
        <div class="row">
            <div class="col-8">
                <!-- card -->
                @foreach ($data as $item)
                    <div class="card border-dark p-2 mb-2" style="width: 90%;">
                        <div class="row my-1 align-items-center">
                            <div class="col-3 rounded">
                                <img src="{{ $item->Product->picture }}" class="img-fluid">
                            </div>
                            <div class="col-9">
                                <div class="d-flex justify-content-between">
                                    <h5>{{ $item->Product->name }}</h5>
                                    <a href="/delete/cart/{{$item->id}}" class="text-dark"><span><i class="bi bi-trash-fill"></i></span></a>
                                </div>
                                <p class="text-secondary">{{ $item->variant }}</p>
                                <div class="d-flex justify-content-between">
                                    <p><small>{{$item->note ?? 'tidak ada catatan'}}</small></p>
                                    <p class="text-secondary">IDR {{ number_format($item->Product->price, 0, '', '.') }}</p>
                                    <p class="me-3"><b>X {{ $item->amount }}</b></p>
                                </div>
                                <h5 class="text-end me-3">IDR {{ number_format($item->Product->price * $item->amount) }}
                                </h5>
                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- end card -->
            </div>
            @php
                $total = 0;
                foreach ($data as $item) {
                    $total = $item->product->price * $item->amount + $total;
                }
            @endphp
            <div class="col-4">
                <div class="card border-dark p-4" style="width: 85%;">
                    <h5>Invoice #{{ $data[0]->order_number }}</h5>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <p><b>Total </b></p>
                        <p>IDR {{ number_format($total, 0, '', '.') }}</p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p><b>Delivery </b></p>
                        <p>IDR 6.000</p>
                    </div>
                    <div class="alert alert-dark text-center" role="alert">
                        <i class="bi bi-geo-alt-fill me-2"></i>
                        {{$data[0]->user->profile->address ?? 'Alamat belum disetting'}}
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <h5>Sub Total</h5>
                        <h5>IDR {{ number_format($total + 6000, 0, '', '.') }}</h5>
                    </div>
                    <button class="btn btn-dark mt-4" style="width: 100%;" id="pay-button" data-id="{{ $data[0]->order_number }}"><i class="bi bi-credit-card me-2"></i>Pay Orders</button>
                </div>
            </div>
        </div>
    </section>

@endsection
