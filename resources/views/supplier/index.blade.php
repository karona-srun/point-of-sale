@extends('layouts.app_cpanal')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('vender/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.supplier')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="customer" class="active">Supplier</a></li>
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
              <h3 class="box-title"><i class="fa fa-list"></i> {{ __('supplier.list_supplier')}}</h3>
              <a href="{{ url('supplier/create')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-plus"></i> {{ __('supplier.button_create_supplier')}}
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>{{ __('supplier.supplier_name')}}</th>
                  <th>{{ __('supplier.email')}}</th>
                  <th>{{ __('supplier.address')}}</th>
                  <th>{{ __('supplier.telephone')}}</th>
                  <th>{{ __('supplier.action')}}</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($supplier as $key => $supp)
                  <tr role="row" class="odd">  
                    <td>{{ $key + 1 }}</td>                
                    <td class="sorting_1">{{ $supp->supplier_name }}</td>
                    <td>{{ $supp->email }}</td>
                    <td>{{ $supp->address }}</td>
                    <td>{{ $supp->telephone }}</td>
                    <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-flat">{{ __('supplier.action')}}</button>
                      <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('supplier/edit/'.$supp->supplier_id) }}"><i class="fa fa-edit"></i>{{ __('supplier.button_edit_supplier')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('supplier/show/'.$supp->supplier_id) }}"><i class="fa fa-print"></i>{{ __('supplier.button_print_supplier')}}</a></li>
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