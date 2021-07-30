@extends('layouts.app_cpanal')

@section('css')
  
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.customer')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="customer" class="active">Customer</a></li>
    </ol>
    
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <a href="{{ url('customer')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-angle-left"></i> {{ __('customer.list_customer')}}
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa  fa-plus-square"></i> {{ __('customer.button_create_customer')}}
            </div>
            <form action="{{ URL::to('customer/store') }}" method="post" class="form-horizontal">
              {!! csrf_field() !!}
              <div class="box-body">
                <!-- Firstname  -->
                <div class="form-group">                
                  <label for="inputEmail3" class="col-sm-2 control-label">{{ __('customer.customer_name')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="customer_name" id="inputEmail3" placeholder="Customer Name">
                  </div>
                </div>
                <!-- / Firstname -->
                <!-- Telephone  -->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">{{ __('customer.telephone')}} :</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" name="telephone" id="inputPassword3" placeholder="Telephone">
                  </div>
                </div> 
                <!-- / Telephone  -->
                <!-- Address  -->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">{{ __('customer.address')}} :</label>
                  <div class="col-sm-6">
                    <textarea class="form-control" rows="3" name="customer_address" placeholder="{{ __('customer.address')}}"></textarea>
                  </div>
                </div> 
                <!-- / Address  -->  
                <!-- Customer type  -->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">{{ __('customer.customer_type')}} :</label>
                  <div class="col-sm-6">
                  <select class="form-control" name="customer_type">
                    <option value="none">None</option>
                    <option value="member">Member</option>
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