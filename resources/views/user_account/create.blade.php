@extends('layouts.app_cpanal')

@section('css')
<style>
  .store-avatar{
    border:1px;
    width:50px;
    height:80px;
  }
  #wallpaper{
    width: 130px;
    position: absolute;
    float: left;
    margin-left: 14px;
    margin-top: 160px;
    left: 0;
  }
</style>
  
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.store')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="store" class="active">Store</a></li>
    </ol>
    
</section>

<section class="content">
    <div class="alert alert-dismissible callout callout-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-info"></i> Alert!</h4>
      Info alert preview. This alert is dismissable.
    </div>
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ url('store')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-angle-left"></i> {{ __('store.list_store')}}
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa  fa-plus-square"></i> {{ __('store.button_create_store')}}
            </div>
            <form class="form-horizontal" action="{{ URL::to('store/store') }}" method="post" enctype="multipart/form-data">
            <input type = "hidden" name = "_token" value = "{{ csrf_token() }}"> 

              <div class="box-body">
                 <!-- Store Code  -->
                 <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('store.store_code')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="store_code" placeholder="{{ __('store.store_code')}}">
                  </div>
                </div>
                <!-- / Store Code -->
                <!-- Store  -->
                <div class="form-group">                
                  <label for="inputEmail3" class="col-sm-2 control-label">{{ __('store.store')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="store_name"placeholder="{{ __('store.store')}}">
                  </div>
                </div>
                <!-- / Store -->
                <!-- Telephone  -->
                <div class="form-group">
                  <label for="inputTelephone" class="col-sm-2 control-label">{{ __('store.telephone')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="store_telephone"  placeholder="{{ __('store.telephone')}}">
                  </div>
                </div> 
                <!-- / Telephone  -->
                <!-- Email  -->
                <div class="form-group">
                  <label for="inputTelephone" class="col-sm-2 control-label">{{ __('store.email')}} :</label>
                  <div class="col-sm-6">
                    <input type="email" class="form-control" name="store_email"  placeholder="{{ __('store.email')}}">
                  </div>
                </div> 
                <!-- / Email  -->
                <!-- Address  -->
                <div class="form-group">
                  <label for="inputAddress" class="col-sm-2 control-label">{{ __('store.address')}} :</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" rows="3" name="store_address" placeholder="{{ __('store.address')}}"></textarea>
                  </div>
                </div> 
                <!-- / Address  -->  
                <!-- Logo  -->
                <div class="form-group">
                  <label for="inputStore_Profile" class="col-sm-2 control-label">{{ __('store.store_profile')}} :</label>
                  <div class="col-sm-6">
                    <img src="{{route('store_avatars','default.jpg')}}" id="image-tag" name="avatar" width="130px" height="150px" />                   
                    <input type="file"  class="btn btn-primary btn-block browse " name="file" id="wallpaper-image" style="display: none;" >
                    <input type="button" class="btn btn-primary wallpaper" id='wallpaper' value="Browse">
                  </div>
                
                <!-- / Logo  -->                
              </div><br><br>            
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
  $("#wallpaper").click(function(){
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