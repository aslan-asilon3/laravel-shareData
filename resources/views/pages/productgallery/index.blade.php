@extends('adminlte::page')

@section('title', 'Productgallery')

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
                                <h3 class="card-title">Add Data Product Gallery</h3>
                              </div>
                              <!-- /.card-header -->
                              <!-- form start -->
                              <form action="{{route('productgallery.store')}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    
                                    
                                    <div class="form-group">
                                        <label class="font-weight-bold">Product ID</label>
                                        <input type="text" class="form-control @error('product_id') is-invalid @enderror" name="product_id" value="{{ old('product_id') }}" placeholder="Insert Product ID">
                                    
                                        @error('product_id')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label class="font-weight-bold">Image</label>
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                                    
                                        <!-- error message untuk title -->
                                        @error('image')
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
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Product</th>
                      <th>Image</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($productgalleries as $productgallery)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $productgallery->product_id }}</td>
                            <td class="text-center">
                                <img src="{{ Storage::url('public/productgalleries/').$productgallery->image }}" class="rounded" style="width: 150px">
                            </td>
                            <td>
                                <a type="button" class="btn btn-success" href=""> <i class="fa fa-eye"></i> </a>
                                <a type="button" class="btn btn-info" href=""> <i class="fa fa-edit"></i> </a>
                                <a type="button" class="btn btn-danger" href=""> <i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            product Gallery Data Unavailable.
                        </div>
                    @endforelse



                    </tfoot>
                  </table>
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