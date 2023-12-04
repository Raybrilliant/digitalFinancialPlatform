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
                              <h2>Dashboard</h2>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="breadcrumb-wrapper">
                              <nav aria-label="breadcrumb">
                                  <ol class="breadcrumb">
                                      <li class="breadcrumb-item active">
                                          <a href="/admin">Dashboard</a>
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
                  <div class="col-lg-4 col-sm-6">
                      <div class="icon-card mb-30">
                          <div class="icon purple">
                              <i class="lni lni-cart-full"></i>
                          </div>
                          <div class="content">
                              <h6 class="mb-10">New Orders</h6>
                              <h3 class="text-bold mb-10">{{$order}}</h3>
                              <p class="text-sm text-success">
                                  <i class="lni lni-arrow-up"></i> +2.00%
                                  <span class="text-gray">(30 days)</span>
                              </p>
                          </div>
                      </div>
                      <!-- End Icon Cart -->
                  </div>
                  <!-- End Col -->
                  <div class="col-lg-4 col-sm-6">
                      <div class="icon-card mb-30">
                          <div class="icon success">
                              <i class="lni lni-dollar"></i>
                          </div>
                          <div class="content">
                              <h6 class="mb-10">Total Income</h6>
                              <h3 class="text-bold mb-10">IDR {{number_format($income,0,'','.')}}</h3>
                              <p class="text-sm text-success">
                                  <i class="lni lni-arrow-up"></i> +5.45%
                                  <span class="text-gray">Increased</span>
                              </p>
                          </div>
                      </div>
                      <!-- End Icon Cart -->
                  </div>
                  <!-- End Col -->
                  <div class="col-lg-4 col-sm-12">
                      <div class="icon-card mb-30">
                          <div class="icon orange">
                              <i class="lni lni-user"></i>
                          </div>
                          <div class="content">
                              <h6 class="mb-10">New User</h6>
                              <h3 class="text-bold mb-10">{{$user}}</h3>
                              <p class="text-sm text-danger">
                                  <i class="lni lni-arrow-down"></i> -25.00%
                                  <span class="text-gray"> Earning</span>
                              </p>
                          </div>
                      </div>
                      <!-- End Icon Cart -->
                  </div>
                  <!-- End Col -->
              </div>
              <!-- End Row -->
              <div class="row">
                  <div class="col-12">
                      <div class="card-style mb-30">
                          <div class="title d-flex flex-wrap justify-content-between">
                              <div class="left">
                                  <h4 class="text-medium mb-10">Top Selling</h4>
                              </div>
                          </div>
                          <div class="table-responsive">
                              <!-- End Title -->
                              <table id="dataTables_disabled" class="table table-striped" style="width: 100%">
                                  <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Sales</th>
                                        <th>Category</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($data->unique('product_id') as $item)
                                    <tr>
                                        <td>{{$item->Product->name}}</td>
                                        <td>{{$data->where('product_id',$item->product_id)->sum('amount')}} Pcs</td>
                                        <td>{{$item->Product->category == 1 ? 'Makanan' : 'Minuman'}}</td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                              </table>
                              <!-- End Table -->
                          </div>
                      </div>
                  </div>
                  <!-- End Row -->
              </div>
              <!-- end container -->
      </section>
      <!-- ========== section end ========== -->
@endsection   