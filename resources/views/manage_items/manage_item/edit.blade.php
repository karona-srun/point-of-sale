@extends('layouts.app_cpanal')

@section('css')
  <style>
  #image-tag{
    cursor: pointer;
    border-radius: 5px;
  }
  </style>
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
            <form action="{{ URL::to('manage_item/update',$items->item_id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
              {{ csrf_field() }}
              <div class="box-body">
                 <!-- Item Code  -->
                 <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.item_code')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="item_code" value="{{ $items ->item_code}}" placeholder="{{ __('item.item_code')}}">
                  </div>
                </div>
                <!-- / Item Code -->     
                <!-- Item -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.item')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="item" value="{{ $items->item}}" placeholder="{{ __('item.item')}}">
                  </div>
                </div>
                <!-- / Item -->
                <!-- Category -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.category')}} :</label>
                  <div class="col-sm-6">
                  <select class="form-control" name="category">
                    @foreach($category as $key => $category)
                    <option value="{{ $category->category_id }}">{{ $category->category }}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
                <!-- / Category -->   
                <!-- Purchase Price -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.purchase_price')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="purchase_price" value="{{ $items->purchase_price }}" placeholder="{{ __('item.purchase_price')}}">
                  </div>
                </div>
                <!-- / Purchase Price -->
                <!-- Selling Price -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.selling_price')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="sell_price" value="{{ $items->sell_price }}" placeholder="{{ __('item.selling_price')}}">
                  </div>
                </div>
                <!-- / Selling Price -->
                <!-- Discount -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.discount')}} (%) :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="discount" value="{{ $items->discount }}" placeholder="{{ __('item.discount')}}">
                  </div>
                </div>
                <!-- / Discount -->
                <!-- Quanlity -->
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('item.quanlity')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="quanlity" value="{{ $items->quanlity }}" placeholder="{{ __('item.quanlity')}}">
                  </div>
                </div>
                <!-- / Quanlity -->
                <!-- Photo -->    
                <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label" style="margin-bottom:10px;">{{ __('item.photo')}} :</label> 
                  <div class="col-sm-6">
                    <img src="{{route('store_avatars','default.jpg')}}" id="image-tag" name="avatar" width="120" height="150" />
                    <input type="file"  class="btn btn-primary btn-block browse col-sm-9" name="photo" id="wallpaper-image" style="display: none;" >                
                  </div>
                </div>               
                <!-- / Photo -->
                
                
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
<script>
  $("#image-tag").click(function(){
      $("#wallpaper-image").trigger('click');    
    });
  
    $("#wallpaper-image").change(function(){
        readURL(this);
    });
    

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function (e) {
          $('#image-tag').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
  }
  }
</script>
@endsection