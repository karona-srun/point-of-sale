@extends('layouts.app_cpanal')

@section('css')
  
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.manage_items')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="manage_item" class="active">Manage Item</a></li>
    </ol>
    
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ url('manage_item')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-angle-left"></i> {{ __('item.list_item')}}
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa  fa-plus-square"></i> {{ __('item.button_create_item')}}
            </div>
            <form action="" method="post" class="form-horizontal">
              <div class="box-body">
                 <!-- Item Code  -->
                 <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.item_code')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_code" id="inputEmail3" placeholder="{{ __('item.item_code')}}">
                  </div>
                </div>
                <!-- / Item Code -->     
                <!-- Item -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.item')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="item" id="inputEmail3" placeholder="{{ __('item.item')}}">
                  </div>
                </div>
                <!-- / Item -->
                <!-- Category -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.category')}} :</label>
                  <div class="col-sm-6">
                  <select class="form-control" names="category">
                    <option>{{ __('item.category')}} 1</option>
                    <option>{{ __('item.category')}} 2</option>
                    <option>{{ __('item.category')}} 3</option>
                    <option>{{ __('item.category')}} 4</option>
                    <option>{{ __('item.category')}} 5</option>
                  </select>
                  </div>
                </div>
                <!-- / Category -->   
                <!-- Purchase Price -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.purchase_price')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="purchase_price" id="inputEmail3" placeholder="{{ __('item.purchase_price')}}">
                  </div>
                </div>
                <!-- / Purchase Price -->
                <!-- Selling Price -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.selling_price')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="selling_price" id="inputEmail3" placeholder="{{ __('item.selling_price')}}">
                  </div>
                </div>
                <!-- / Selling Price -->
                <!-- Discount -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.discount')}}(%) :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="discount" id="inputEmail3" placeholder="{{ __('item.discount')}}">
                  </div>
                </div>
                <!-- / Discount -->
                <!-- Quanlity -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.quanlity')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="quanlity" id="inputEmail3" placeholder="{{ __('item.quanlity')}}">
                  </div>
                </div>
                <!-- / Quanlity -->
                <!-- Quanlity -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.photo')}} :</label>
                  <div class="col-sm-6">
                    <input type="file" id="exampleInputFile">
                  </div>
                </div>
                <!-- / Quanlity -->
                
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