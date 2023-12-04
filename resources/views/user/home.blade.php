@extends('user/layout')
@section('content')
    <section class="container">
        <div class="d-flex justify-content-between align-self-center flex-wrap">
            <!-- card -->
            @foreach ($data as $item)
            <div class="card border border-0 p-3 mb-5" style="width: 18rem; background-color: #f2f0ea">
                <a href="detail/{{$item->id}}" class="text-decoration-none text-dark">
                    <img src="{{$item->picture}}" class="img-fluid" />
                    <div class="text-center my-4">
                        <h6 class="card-title">{{$item->name}}</h6>
                        <h5><b>IDR {{number_format($item->price,0,'','.')}}</b></h5>
                    </div>
                </a>
            </div>
            @endforeach
            <!-- end card -->
        </div>
    </section>
@endsection
