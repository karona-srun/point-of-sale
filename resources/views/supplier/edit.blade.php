@extends('layouts.app_cpanal')

@section('css')
  
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.supplier')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="customer" class="active">Supplier</a></li>
    </ol>
    
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ url('supplier')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-angle-left"></i> {{ __('supplier.list_supplier')}}
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa  fa-edit"></i> {{ __('supplier.button_edit_supplier')}}
            </div>
            <form action="{{ url('supplier/update/'.$supplier->supplier_id)}}" method="post" class="form-horizontal">
              {!! csrf_field() !!}
              <div class="box-body">
                <!-- Firstname  -->
                <div class="form-group">                
                  <label for="inputEmail3" class="col-sm-2 control-label">{{ __('supplier.supplier_name')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" name="supplier_name" class="form-control" id="inputEmail3" placeholder="{{ __('supplier.supplier_name')}}" value="{{ $supplier->supplier_name}}">
                  </div>
                </div>
                <!-- / Firstname -->
                <!-- Company  -->
                <div class="form-group">                
                  <label for="inputEmail3" class="col-sm-2 control-label">{{ __('supplier.company_name')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" name="company_name" class="form-control" id="inputEmail3" placeholder="{{ __('supplier.company_name')}}"  value="{{ $supplier->company_name}}">
                  </div>
                </div>
                <!-- / Company -->
                <!-- Telephone  -->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">{{ __('supplier.telephone')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" name="telephone" class="form-control" id="inputPassword3" placeholder="{{ __('supplier.telephone')}}"  value="{{ $supplier->telephone}}">
                  </div>
                </div> 
                <!-- / Telephone  -->
                 <!-- Email  -->
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">{{ __('supplier.email')}} :</label>
                  <div class="col-sm-6">
                    <input type="email" name="email" class="form-control" id="inputPassword3" placeholder="{{ __('supplier.email')}}"  value="{{ $supplier->email}}">
                  </div>
                </div> 
                <!-- / Email  -->
                <!-- Address  -->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">{{ __('supplier.address')}} :</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" name="address" rows="3" placeholder="{{ __('supplier.address')}}">{{ $supplier->address}}</textarea>
                  </div>
                </div> 
                <!-- / Address  -->  
                <!-- Customer type  -->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">{{ __('supplier.supplier_type')}} :</label>
                  <div class="col-sm-6">
                  <select name="supplier_type"  class="form-control">                  
                    <option>Dealer</option>
                    <option>Company</option>
                    <option>Wholesaller</option>
                    <option>Distributor</option>
                  </select>
                  </div>
                </div> 
                <!-- / Customer type  -->                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info"> {{ __('app.button_save')}}</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
        </div>
    </div>
</section>
@endsection
@section('js')

@endsection