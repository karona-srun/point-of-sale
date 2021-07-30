@extends('layouts.app_cpanal')

@section('css')
  
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.manage_tax')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="manage_tax" class="active">Tax</a></li>
    </ol>
    
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ url('manage_tax')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-angle-left"></i> {{ __('tax.list_tax')}}
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa  fa-edit"></i> {{ __('tax.button_edit_tax')}}
            </div>
            <form action="" method="post" class="form-horizontal">
              <div class="box-body">
                 <!-- category  -->
                 <div class="form-group">                
                  <label for="inputStore" class="col-sm-2 control-label">{{ __('tax.tax')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="store_code" id="inputEmail3" placeholder="{{ __('tax.tax')}}">
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