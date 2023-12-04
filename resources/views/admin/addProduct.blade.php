 @extends('admin/layout')
 @section('content')
     <!-- ========== section start ========== -->
     <section class="section">
         <div class="container-fluid">
             <!-- ========== title-wrapper start ========== -->
             <div class="title-wrapper pt-30">
                 <div class="row align-items-center">
                     <div class="col-md-6">
                         <div class="title">
                             <h2>Product</h2>
                         </div>
                     </div>
                     <div class="col-md-6">
                         <div class="breadcrumb-wrapper">
                             <nav aria-label="breadcrumb">
                                 <ol class="breadcrumb">
                                     <li class="breadcrumb-item">
                                         <a href="/admin">Dashboard</a>
                                     </li>
                                     <li class="breadcrumb-item">
                                         <a href="/admin/product">Product</a>
                                     </li>
                                     <li class="breadcrumb-item active" aria-current="page">
                                         {{$title}}
                                     </li>
                                 </ol>
                             </nav>
                         </div>
                     </div>
                     <!-- end col -->
                 </div>
                 <!-- end row -->
             </div>
             <!-- ========== title-wrapper end ========== -->
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card-style mb-30">
                         <div class="title d-flex flex-wrap align-items-center justify-content-between">
                             <div class="left">
                                 <h6 class="text-medium mb-30">{{$title}} Product</h6>
                             </div>
                         </div>
                         <!-- End Title -->
                         <form action="/admin/add" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id ?? null}}">
                             <div class="mb-3">
                                 <label for="name" class="form-label">Name</label>
                                 <input type="text" class="form-control" id="name" name="name" value="{{$data->name ?? ''}}" required>
                             </div>
                             <div class="mb-3">
                                 <label for="picture" class="form-label">Picture</label>
                                 <input type="text" class="form-control" id="picture" name="picture" value="{{$data->picture ?? ''}}" required>
                             </div>
                             <label for="category" class="form-label">Category</label>
                             <select class="form-select mb-3" name="category" id="category" required>
                                @if ($title == 'Edit')
                                <option value="1" {{$data->category == 1 ? 'selected' : ''}}>Makanan</option>
                                <option value="2" {{$data->category == 2 ? 'selected' : ''}}>Minuman</option>
                                @else
                                <option value="1">Makanan</option>
                                <option value="2">Minuman</option>
                                @endif
                              </select>
                             <div class="mb-3">
                                 <label for="description" class="form-label">Description</label>
                                 <textarea class="form-control" id="description" name="description">{{$data->description ?? ''}}</textarea>
                             </div>
                             <div class="mb-3">
                                 <label for="variant" class="form-label">Variant</label>
                                 <input type="text" class="form-control" id="variant" name="variant" value="{{$data->variant ?? ''}}" required>
                             </div>
                             <div class="mb-3">
                                 <label for="stock" class="form-label">Stock</label>
                                 <input type="number" class="form-control" id="stock" name="stock" value="{{$data->stock ?? ''}}" required>
                             </div>
                             <div class="mb-3">
                                 <label for="price" class="form-label">Price</label>
                                 <input type="number" class="form-control" id="price" name="price" value="{{$data->price ?? ''}}" required>
                             </div>

                             <button type="submit" class="btn btn-primary">Submit</button>
                         </form>
                     </div>
                 </div>
                 {{-- end row --}}
             </div>
             <!-- end container -->
     </section>
     <!-- ========== section end ========== -->
 @endsection
