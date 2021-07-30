@extends('layouts.app_cpanal')

@section('css')
<link rel="stylesheet" href="{{ asset('vender/iCheck/all.css') }}">
<style>
  .permission{    
    margin-left: 100px;
    margin-right: 10px;
  }
</style>
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.employee_role')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="role" class="active">Role</a></li>
    </ol>
    
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ url('role')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-angle-left"></i> {{ __('role.list_role')}}
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">

        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true"><i class="fa fa-circle-o"></i> {{ __('role.button_create_role')}}</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false"><i class="fa fa-toggle-on"></i> {{ __('role.permission')}}</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
              <form action="{{ URL::to('role/store') }}" method="post" class="form-horizontal">
              {{ csrf_field() }}
                <div class="box-body">
                  <!-- Role  -->
                  <div class="form-group">                
                    <label for="inputEmail3" class="col-sm-2 control-label">{{ __('role.role_name')}} :</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" name="role_name" id="inputEmail3" placeholder="{{ __('role.role_name')}}" require="">
                    </div>
                  </div>
                  <!-- / Role -->                         
                </div>
               
              
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2">
              <!-- checkbox -->
              <div class="form-group permission">
                <!-- dashboard -->
                <div class="radio">
                    <label>
                      <input type="radio" name="dashboard" class="subitem" value="0" checked="">
                      {{ __('app.dashboard')}}
                  </label>
                </div>
                <!-- dashboard -->                
                <!-- customer -->
                <div class="radio">
                  <label>
                    <input type="radio" name="customer" class="subitem" value="0" checked="">
                    {{ __('app.customer')}}
                  </label>
                </div>
                <!-- customer -->
                <!-- manage_customer -->
                <div class="radio">
                  <label class="subitem">
                    <input type="radio" name="manage_customer" class="subitem" value="0" checked="">
                    {{ __('app.manage_customer')}}
                  </label>
                </div>
                <!-- manage_customer -->               
                <!-- supplier -->
                <div class="radio">
                  <label>
                    <input type="radio" name="supplier" class="subitem" value="0" checked="">
                    {{ __('app.supplier')}}
                  </label>
                </div>
                <!-- supplier -->
                <!-- manage_supplier -->
                <div class="radio">
                  <label class="subitem">
                    <input type="radio" name="manage_supplier" class="subitem" value="0" checked="">
                    {{ __('app.manage_supplier')}}
                  </label>
                </div>
                <!-- manage_supplier -->                
                <!-- employee -->
                <div class="radio">
                  <label>
                    <input type="radio" name="employee" class="subitem" value="0" checked="">
                    {{ __('app.employee')}}
                  </label>
                </div>
                <!-- employee -->
                <!-- employee_role -->
                <div class="radio">
                  <label class="subitem">
                    <input type="radio" name="employee_role" class="subitem" value="0" checked="">
                    {{ __('app.employee_role')}}
                  </label>
                </div>
                <!-- employee_role -->  
                <!-- manage_employeer -->
                <div class="radio">
                  <label class="subitem">
                    <input type="radio" name="manage_employee" class="subitem" value="0" checked="">
                    {{ __('app.manage_employee')}}
                  </label>
                </div>
                <!-- manage_employeer -->

                <!-- store -->
                <div class="radio">
                  <label>
                    <input type="radio" name="store" class="subitem" value="0" checked="">
                    {{ __('app.store')}}
                  </label>
                </div>
                <!-- store -->
                <!-- manage_store -->
                <div class="radio">
                  <label class="subitem">
                    <input type="radio" name="manage_store" class="subitem" value="0" checked="">
                    {{ __('app.manage_store')}}
                  </label>
                </div>
                <!-- manage_category -->
                <div class="radio">
                  <label >
                    <input type="radio" name="category" class="subitem" value="0" checked="">
                    {{ __('app.manage_category')}}
                  </label>
                </div>
                <!-- manage_category -->
                 <!-- manage_category -->
                <div class="radio">
                  <label class="subitem">
                    <input type="radio" name="manage_category" class="subitem" value="0" checked="">
                    {{ __('app.manage_category')}}
                  </label>
                </div>
                <!-- manage_category -->
                <!-- manage_items -->
                <div class="radio">
                  <label class="subitem">
                    <input type="radio" name="manage_items" class="subitem" value="0" checked="">
                    {{ __('app.manage_items')}}
                  </label>
                </div>
                <!-- manage_items -->                
               <!-- manage_tax -->
               <div class="radio">
                  <label class="subitem">
                    <input type="radio" name="manage_tax" class="subitem" value="0" checked="">
                    {{ __('app.manage_tax')}}
                  </label>
                </div>
                <!-- manage_tax -->
                <!-- purchase  -->
                <div class="radio">
                  <label>
                    <input type="radio"  name="purchase" value="0" checked="">
                    {{ __('app.purchase')}}
                  </label>
                </div>
                <!-- / purchase -->
                <!-- manage_purchase -->
                <div class="radio">
                    <label class="subitem">
                      <input type="radio" name="manage_purchase" value="0" checked="">
                      {{ __('app.manage_purchase')}}
                  </label>
                </div>
                <!-- / manage_purchase -->
                <!-- purchase_history -->
                <div class="radio">
                    <label class="subitem">
                      <input type="radio" name="purchase_history" value="0" checked="">
                      {{ __('app.purchase_history')}}
                  </label>
                </div>
                <!-- / purchase_history -->
                
                <!-- Sale  -->
                <div class="radio">
                  <label>
                    <input type="radio"  name="sales" value="0" checked="">
                    {{ __('app.sales')}}
                  </label>
                </div>
                <!-- / Sale -->
                <!-- manage_sale -->
                <div class="radio">
                    <label class="subitem">
                      <input type="radio" name="manage_sales" value="0" checked="">
                      {{ __('app.manage_sale')}}
                  </label>
                </div>
                <!-- / manage_sale -->
                <!-- sale_history -->
                <div class="radio">
                    <label class="subitem">
                      <input type="radio" name="sales_history" class="subitem" value="0" checked="">
                      {{ __('app.sale_history')}}
                  </label>
                </div>
                <!-- / sale_history -->
                <!-- sale_history -->
                <div class="radio">
                    <label class="subitem">
                      <input type="radio" name="store_list" class="subitem" value="0" checked="">
                      {{ __('app.store_list')}}
                  </label>
                </div>
                
                <!-- Report  -->
                <div class="radio">
                  <label>
                    <input type="radio"  name="report" value="0" checked="">
                    {{ __('app.reports')}}
                  </label>
                </div>
                <!-- / Report -->
                <!-- Sale Report  -->
                <div class="radio">
                  <label class="subitem">
                    <input type="radio"  name="sales_report" value="0" checked="">
                    {{ __('app.sale_report')}}
                  </label>
                </div>
                <!-- / Sale Report -->
                <!-- Items Report  -->
                <div class="radio">
                  <label class="subitem">
                    <input type="radio"  name="items_store" value="0" checked="">
                    {{ __('app.items_report')}}
                  </label>
                </div>
                <!-- / Items Report -->

                <!-- User Accesslog  -->
                <div class="radio">
                    <label class="subitem">
                      <input type="radio" name="user_accesslog" value="0" checked="">
                      {{ __('app.user_accesslog')}}
                    </label>
                  </div>
                  <!-- / User Accesslog -->
                <!-- General Setting  -->
                <div class="radio">
                    <label>
                      <input type="radio" name="general_setting"  id="optionsRadios1" value="0" checked="">
                      {{ __('app.general_setting')}}
                    </label>
                  </div>
                  <!-- / General Setting -->
              </div>
            </div> 
            
            <!--  -->
             <!-- /.box-body -->
             <div class="box-footer">
                  <button type="submit" class="btn btn-info"> {{ __('app.button_save')}}</button>
                </div>
                <!-- /.box-footer -->
            </form>             
          </div>
          </div>
      </div>
    </div>
</section>
@endsection
@section('js')
<script>
  $('document').ready(function(){
   $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    }) 
  })
 
</script>
<script src="{{ asset('vender/iCheck/icheck.min.js')}}"></script>
@endsection