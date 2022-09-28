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


    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Edit Data Product</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="card-body">
                
                
                <div class="form-group">
                    <label class="font-weight-bold">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name) }}" placeholder="">
                
                    <!-- error message untuk title -->
                    @error('name')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                
                
                <div class="form-group">
                    <label class="font-weight-bold">price</label>
                    <input type="integer" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price',$product->price) }}" placeholder="">
                
                    <!-- error message untuk title -->
                    @error('price')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold">stock</label>
                    <input type="integer" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock',$product->price) }}" placeholder="">
                
                    <!-- error message untuk title -->
                    @error('stock')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold">buy</label>
                    <input type="integer" class="form-control @error('buy') is-invalid @enderror" name="buy" value="{{ old('buy',$product->buy) }}" placeholder="">
                
                    <!-- error message untuk title -->
                    @error('buy')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold">sell</label>
                    <input type="integer" class="form-control @error('sell') is-invalid @enderror" name="sell" value="{{ old('sell',$product->sell) }}" placeholder="">
                
                    <!-- error message untuk title -->
                    @error('sell')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold">status</label>
                    <input type="text" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status',$product->status) }}" placeholder="">
                
                    <!-- error message untuk title -->
                    @error('status')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label class="font-weight-bold">description</label>
                    <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description',$product->description) }}" placeholder="">
                
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

@stop