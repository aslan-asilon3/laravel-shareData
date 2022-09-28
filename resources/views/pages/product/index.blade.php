@extends('adminlte::page')

@section('title', 'Product')

@section('content')

@include('sweetalert::alert')
<style>


    /*left right modal*/
.modal.left_modal, .modal.right_modal{
  position: fixed;
  z-index: 99999;
}
.modal.left_modal .modal-dialog,
.modal.right_modal .modal-dialog {
  position: fixed;
  margin: auto;
  width: 22%;
  height: 100%;
  -webkit-transform: translate3d(0%, 0, 0);
      -ms-transform: translate3d(0%, 0, 0);
       -o-transform: translate3d(0%, 0, 0);
          transform: translate3d(0%, 0, 0);
}

.modal-dialog {
    /* max-width: 100%; */
    margin: 1.75rem auto;
}
@media (min-width: 576px)
{
.left_modal .modal-dialog {
    max-width: 100%;
}

.right_modal .modal-dialog {
    max-width: 100%;
}
}
.modal.left_modal .modal-content,
.modal.right_modal .modal-content {
  /*overflow-y: auto;
    overflow-x: hidden;*/
    height: 100vh !important;
}

.modal.left_modal .modal-body,
.modal.right_modal .modal-body {
  padding: 15px 15px 30px;
}

/*.modal.left_modal  {
    pointer-events: none;
    background: transparent;
}*/

.modal-backdrop {
    display: none;
}


/*Right*/
.modal.right_modal.fade .modal-dialog {
  right: -50%;
  -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
     -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
       -o-transition: opacity 0.3s linear, right 0.3s ease-out;
          transition: opacity 0.3s linear, right 0.3s ease-out;
}



.modal.right_modal.fade.show .modal-dialog {
  right: 0;
  box-shadow: 0px 0px 19px rgba(0,0,0,.5);
}

/* ----- MODAL STYLE ----- */
.modal-content {
  border-radius: 0;
  border: none;
}



.modal-header.left_modal, .modal-header.right_modal {

  padding: 10px 15px;
  border-bottom-color: #EEEEEE;
  background-color: #FAFAFA;
}

.modal_outer .modal-body {
    /*height:90%;*/
    overflow-y: auto;
    overflow-x: hidden;
    height: 91vh;
}
</style>


    <!-- left modal -->
    <div class="modal modal_outer right_modal fade" id="information_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" >
        <div class="modal-dialog" role="document">
            <form method="post" action="" id="sales-import" enctype="multipart/form-data">
                <div class="modal-content ">
                    <!-- <input type="hidden" name="email_e" value="admin@filmscafe.in"> -->
                    <div class="modal-header">
                    <h2 class="modal-title">Input Data Sales:</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body get_quote_view_modal_body">
                                @csrf

                                @if (session('error'))
                                    <div class="alert alert-success">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label for="">File (.xls, .xlsx)</label>
                                    <input type="file" class="form-control file" name="file">
                                    <p class="text-danger">{{ $errors->first('file') }}</p>

                                    <a href="" class="btn btn-info" ><i class="fas fa-download"></i>Download Template Excel</a>
                                </div>

                                <div class="">
                                    <p style="font-size:17px;font-weight:bold">Langkah-langkah import data sales</p>

                                    <ol>
                                    <li>Klik tombol <b> Browse</b> dan pilih file excel yang akan di import, <br> perhatikan limit pada saat import data excel maksimal 20.000 baris data </li>
                                    <br>
                                    <li>Klik tombol <b> Download Template Excel </b>untuk mendownload template excel,<br> template ini digunakan untuk menginput data sales secara manual </li>
                                    <br>
                                    <li>Pada Kolom <b> Tanggal di Template Excel </b>dengan Format <b> Text </b>  </li>
                                    <br>
                                    {{-- <li>Milk</li> --}}
                                    </ol> 
                                </div>
            
                                <span id="data_reference_import"></span>
                                <input id="reference_import" type="hidden" name="reference_import" value="">
                                <input id="type_input" type="hidden" name="type_input" value="import">
                            </div>
                            <div class="modal-footer">
                                <a type="button" class="btn btn-secondary btn-flat" data-dismiss="modal"><i class="fas fa-times"></i> Close</a>
                                <button id="" type="submit" class="btn bg-lime btn-flat"><i class="fas fa-upload"></i> Import</button>
                            </div>




                </div><!-- modal-content -->
            </form>
        </div><!-- modal-dialog -->
    </div>
    <!-- End Left modal -->


    <!-- Add Data modal -->
    <div class="modal modal_outer right_modal fade" id="add_data_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" >
        <div class="modal-dialog" role="document">
            <form method="post" action="" id="sales-import" enctype="multipart/form-data">
                <div class="modal-content ">
                    <!-- <input type="hidden" name="email_e" value="admin@filmscafe.in"> -->
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body get_quote_view_modal_body">


                        <div class="col-md-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                              <div class="card-header">
                                <h3 class="card-title">Add Data Product</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form action="{{route('product.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                        <label class="font-weight-bold">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="">
                                    
                                        <!-- error message untuk title -->
                                        @error('name')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="font-weight-bold">price</label>
                                        <input type="integer" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="">
                                    
                                        <!-- error message untuk title -->
                                        @error('price')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="font-weight-bold">stock</label>
                                        <input type="integer" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" placeholder="">
                                    
                                        <!-- error message untuk title -->
                                        @error('stock')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="font-weight-bold">buy</label>
                                        <input type="integer" class="form-control @error('buy') is-invalid @enderror" name="buy" value="{{ old('buy') }}" placeholder="">
                                    
                                        <!-- error message untuk title -->
                                        @error('buy')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="font-weight-bold">sell</label>
                                        <input type="integer" class="form-control @error('sell') is-invalid @enderror" name="sell" value="{{ old('sell') }}" placeholder="">
                                    
                                        <!-- error message untuk title -->
                                        @error('sell')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="font-weight-bold">status</label>
                                        <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" placeholder="">
                                    
                                        <!-- error message untuk title -->
                                        @error('status')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="font-weight-bold">description</label>
                                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="">
                                    
                                        <!-- error message untuk title -->
                                        @error('description')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                              </form>
                            </div>
                            <!-- /.card -->

                        </div>


                    </div>
                </div><!-- modal-content -->
            </form>
        </div><!-- modal-dialog -->
    </div>
    <!-- Add Data modal -->



    <section class="content mt-3">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">
                    {{-- <a type="button" href="" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Data</a> --}}
                        {{-- Add Data right side --}}
                        <button class="btn  btn-success  btn-import-sales" type="button" id="btn-import" data-toggle="modal" data-target="#add_data_modal"><i class="fas fa-plus"></i> Add Data</button>
                        <div class="progress" id="progressBar" style="text-align: center;height:20px; display:none" >
                            <div class="bar" style="text-align: center;height:20px;"></div >
                            <div class="percent" style="text-align: center; height:20px; padding-top:10px;margin:none;">0%</div >
                        </div>
                        {{-- import right side --}}
                        <button class="btn  btn-success  btn-import-sales" type="button" id="btn-import" data-toggle="modal" data-target="#information_modal"><i class="fas fa-upload"></i> Import Data Sales</button>
                        <div class="progress" id="progressBar" style="text-align: center;height:20px; display:none" >
                            <div class="bar" style="text-align: center;height:20px;"></div >
                            <div class="percent" style="text-align: center; height:20px; padding-top:10px;margin:none;">0%</div >
                        </div>
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div style="overflow-x:auto;">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Heading</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Buy</th>
                            <th>Sell</th>
                            <th>Batch</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Comment</th>
                            <th>Rating</th>
                            <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse  ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @foreach($product->productgalleries()->get() as $productgallery)
                                        <img src="{{ Storage::url('public/productgalleries/').$productgallery->image }}" class="rounded" style="width: 150px">
                                        @endforeach
                                    </td>
                                    <td>{{ mb_strimwidth($product->name, 0, 10, "..."); }}</td>
                                    <td> {{ mb_strimwidth($product->heading, 0, 10, "...");  }}</td>
                                    <td>{{ $product->color }}</td>
                                    <td>{{ $product->size }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>{{ $product->buy }}</td>
                                    <td>{{ $product->sell }}</td>
                                    <td>{{ $product->batch }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td>{{ mb_strimwidth($product->description, 0, 10, "..."); }}</td>
                                    <td>{{ mb_strimwidth($product->comment, 0, 10, "..."); }}</td>
                                    <td>{{ mb_strimwidth($product->rating, 0, 10, "..."); }}</td>
                                    <td>
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('product.destroy', $product->id) }}" method="POST">
                                            <a href="{{ route('product.show', $product->id) }}" class="btn btn-sm btn-info"> <i class="fa fa-eye"></i> </a>
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-sm btn-primary"> <i class="fa fa-edit"></i> </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fa fa-trash"></i> </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <div class="alert alert-danger">
                                    Product Data Unavailable
                                </div>
                            @endforelse



                            </tfoot>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>

@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
      <!-- Font Awesome -->
  <link rel="stylesheet" href="adminlte3/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="adminlte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@stop

@section('js')
<script src="adminlte3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="adminlte3/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="adminlte3/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="adminlte3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="adminlte3/plugins/jszip/jszip.min.js"></script>
<script src="adminlte3/plugins/pdfmake/pdfmake.min.js"></script>
<script src="adminlte3/plugins/pdfmake/vfs_fonts.js"></script>
<script src="adminlte3/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="adminlte3/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="adminlte3/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
          }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
          $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
          });
        });
      </script>

@stop