@extends('layouts.app_cpanal')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('vender/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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
        @include('message/flash-message')  
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header panal-primary">
              <h3 class="box-title"><i class="fa fa-list"></i> {{ __('tax.list_tax')}}</h3>
              <a href="{{ url('manage_tax/create')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-plus"></i> {{ __('tax.button_create_tax')}}
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{{ __('tax.tax_no')}}</th>
                  <th>{{ __('tax.tax')}}</th>
                  <th>{{ __('tax.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                  <tr role="row" class="odd">                  
                    <td class="sorting_1">1</td>
                    <td>Drink</td>
                    <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-flat">{{ __('tax.actions')}}</button>
                      <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('manage_tax/2/edit') }}"><i class="fa fa-edit"></i>{{ __('tax.button_edit_tax')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('manage_tax/show') }}"><i class="fa fa-print"></i>{{ __('tax.button_print_tax')}}</a></li>
                      </ul>
                    </div>
                    </td>
                  </tr>    
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
   
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection