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
              <h3 class="box-title"><i class="fa  fa-print"></i> {{ __('category.button_print_category')}}
            </div>
              <div class="box-body">
                 <!-- category  -->
                 <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('category.category')}} :</label>
                  <div class="col-sm-6">
                  <label for="inputStore" class="col-sm-2 control-label">{{ $category->category }}</label>
                  </div>
                </div>
                <!-- / category -->                              
              </div>
          </div>
        </div>
    </div>
</section>
@endsection
@section('js')

@endsection