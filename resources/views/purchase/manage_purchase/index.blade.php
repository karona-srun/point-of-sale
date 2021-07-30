@extends('layouts.app_cpanal')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('vender/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.manage_purchase')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="manage_purchase" class="active">Manage Purchase</a></li>
    </ol>
</section>

<section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="alert alert-dismissible callout callout-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire
                soul, like these sweet mornings of spring which I enjoy with my whole heart.
          </div>

          <!-- <div class="alert alert-dismissible callout callout-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Alert!</h4> 
                session()->has('success')
          </div> -->
          @if(session()->has('message'))
    <div class="alert alert-dismissible callout callout-info">
    <h4><i class="icon fa fa-info"></i> Message!</h4> 
        {{ session()->get('message') }}
    </div>
@endif

        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header panal-primary">
              <h3 class="box-title"><i class="fa fa-list"></i> {{ __('purchase.list_purchase')}}</h3>
              <a href="{{ url('manage_purchase/create')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-plus"></i> {{ __('purchase.button_create_purchase')}}
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{{ __('purchase.purchase_no')}}</th>
                  <th>{{ __('purchase.paid_by')}}</th>
                  <th>{{ __('purchase.purchase')}}</th>
                  <th>{{ __('purchase.purchase_code')}}</th>
                  <th>{{ __('purchase.category')}}</th>
                  <th>{{ __('purchase.quanlity')}}</th>
                  <th>{{ __('purchase.purchase_price')}}</th>
                  <th>{{ __('purchase.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($purchase as $key => $purchase)
                  <tr role="row" class="odd">                  
                    <td class="sorting_1">{{ $key + 1 }}</td>
                    <td>{{ $purchase->paid_by }}</td>
                    <td>{{ $purchase->supplier_id }}</td>
                    <td>{{ $purchase->employee_id }}</td>
                    <td>{{ $purchase->date }}</td>
                    <td>{{ $purchase->total_qty }}</td>
                    <td>{{ $purchase->total_payment }}</td>
                    <td>
                        <a href="{{ URL::to('manage_purchase/show/1') }}" class="btn btn-sm btn-default"><i class="fa fa-ellipsis-h"></i></a>
                        <a href="{{ URL::to('manage_purchase/edit/1') }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>
               
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