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
                                     <li class="breadcrumb-item active" aria-current="page">
                                         Product
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
                                 <h6 class="text-medium mb-30">Product List</h6>
                             </div>
                             <div class="right">
                                 <a href="/admin/add-product"><button class="btn btn-primary">New</button></a>
                             </div>
                         </div>
                         <!-- End Title -->
                         @if (session()->has('msg'))
                             <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                 <strong>{{ session('msg') }}</strong>
                                 <button type="button" class="btn-close" data-bs-dismiss="alert"
                                     aria-label="Close"></button>
                             </div>
                         @endif
                         <div class="table-responsive">
                             <table id="dataTables" class="table table-striped" style="width: 100%">
                                 <thead>
                                     <tr>
                                         <th class="text-center">Products</th>
                                         <th class="text-center">Category</th>
                                         <th class="text-center">Price</th>
                                         <th class="text-center">Stock</th>
                                         <th class="text-center">Actions</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     @foreach ($data as $item)
                                         <tr>
                                             <td>
                                                 <div class="product text-center">
                                                     <div class="image">
                                                         <img src="{{ $item->picture }}" style="width: 100px" />
                                                     </div>
                                                     <p class="text-sm">{{ $item->name }}</p>
                                                 </div>
                                             </td>
                                             <td class="text-center">{{ $item->category == 1 ? 'Makanan' : 'Minuman' }}</td>
                                             <td class="text-center">{{ $item->price }}</td>
                                             <td class="text-center">{{ $item->stock }}</td>
                                             <td>
                                                 <div class="action justify-content-center">
                                                     <button class="more-btn ml-10 dropdown-toggle" id="moreAction1"
                                                         data-bs-toggle="dropdown" aria-expanded="false">
                                                         <i class="lni lni-more-alt"></i>
                                                     </button>
                                                     <ul class="dropdown-menu dropdown-menu-start">
                                                         <li class="dropdown-item">
                                                             <a href="/admin/delete/{{ $item->id }}"
                                                                 class="text-gray">Remove</a>
                                                         </li>
                                                         <li class="dropdown-item">
                                                             <a href="/admin/edit/{{ $item->id }}"
                                                                 class="text-gray">Edit</a>
                                                         </li>
                                                     </ul>
                                                 </div>
                                             </td>
                                         </tr>
                                     @endforeach
                                 </tbody>
                             </table>
                             <!-- End Table -->
                         </div>
                     </div>
                 </div>
                 {{-- end row --}}
             </div>
             <!-- end container -->
     </section>
     <!-- ========== section end ========== -->
 @endsection
