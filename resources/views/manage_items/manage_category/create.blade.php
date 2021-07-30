@extends('layouts.app_cpanal')

@section('css')
  
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.manage_category')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="manage_category" class="active">Category</a></li>
    </ol>
    
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ url('manage_category')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-angle-left"></i> {{ __('category.list_category')}}
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa  fa-plus-square"></i> {{ __('category.button_create_category')}}
            </div>
            <form action="{{ url('manage_category/store')}}" method="post" class="form-horizontal">
                <input type = "hidden" name = "_token" value = "{{ csrf_token() }}"> 
              <div class="box-body">
                 <!-- category  -->
                 <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('category.category')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="category" id="input_category" placeholder="{{ __('category.category')}}">
                  </div>
                </div>
                <!-- / category -->    
                <!-- category  -->
                 <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('category.description')}} :</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" name="description" id="input_description" placeholder="{{ __('category.description')}}"></textarea>
                  </div>
                </div>
                <!-- / category -->                            
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