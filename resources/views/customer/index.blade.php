@extends('layouts.app_cpanal')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('vender/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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
          @include('message/flash-message')       
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header panal-primary">
              <h3 class="box-title"><i class="fa fa-list"></i> {{ __('customer.list_customer')}}</h3>
              <a href="{{ url('customer/create')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-plus"></i> {{ __('customer.button_create_customer')}}
              </a>
            </div>            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{{ __('customer.customer_no')}}</th>
                  <th>{{ __('customer.customer_name')}}</th>
                  <th>{{ __('customer.telephone')}}</th>
                  <th>{{ __('customer.address')}}</th>
                  <th>{{ __('customer.customer_type')}}</th>
                  <th>{{ __('customer.action')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($customer as $key => $customers) 
                <tr role="row" class="odd">  
                  <td class="sorting_1">{{$key + 1}}</td>
                  <td>{{ $customers->customer_name }}</td>
                  <td>{!!$customers->telephone!!}</td>
                  <td>{!!$customers->address!!}</td>
                  <td>{!!$customers->customer_type!!}</td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-flat">{{ __('customer.action')}}</button>
                      <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('customer/edit',$customers->customer_id) }}"><i class="fa fa-edit"></i>{{ __('customer.button_edit_customer')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('customer/show',$customers->customer_id) }}"><i class="fa fa-print"></i>{{ __('customer.button_print_customer')}}</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection
@section('js')
<!-- DataTables -->
<script src="{{ asset('vender/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vender/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {   
    
  })
</script>
@endsection