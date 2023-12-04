@extends('user/layout');
@section('content')
    <section class="container d-flex">
        <div class="card mx-auto mt-1 mb-5 border-dark p-5" style="width: 50%;">
            <h3 class="text-center">Profile</h3>
            @if (session()->has('msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>{{session('msg')}}</strong>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <form action="/profile/update" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control p-2" id="name" name="name" value="{{$data->profile->name ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control p-2" id="email" name="email" value="{{$data->email ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="phoneNumber" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control p-2" id="phoneNumber" name="phoneNumber" value="{{$data->profile->phone_number ?? ''}}">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control p-2" cols="40" id="address" name="address">{{$data->profile->address ?? ''}}</textarea>
                </div>
                <button type="submit" class="btn btn-dark py-3 mt-5" style="width: 100%;">Update</button>
            </form>
             <a href="/logout"><button class="btn btn-outline-danger py-3" style="width: 100%;">Logout</button></a>
            </p>
        </div>
    </section>
@endsection
