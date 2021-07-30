@extends('layouts.app_cpanal')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('vender/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.manage_items')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="manage_item" class="active">Manage Item</a></li>
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

          <div class="alert alert-dismissible callout callout-info">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-info"></i> Alert!</h4>
                Info alert preview. This alert is dismissable.
          </div>

        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header panal-primary">
              <h3 class="box-title"><i class="fa fa-list"></i> {{ __('item.list_item')}}</h3>
              <a href="{{ url('manage_item/create')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-plus"></i> {{ __('item.button_create_item')}}
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{{ __('item.item_no')}}</th>
                  <th>{{ __('item.item_photo')}}</th>
                  <th>{{ __('item.item')}}</th>
                  <th>{{ __('item.item_code')}}</th>
                  <th>{{ __('item.category')}}</th>
                  <th>{{ __('item.quanlity')}}</th>
                  <th>{{ __('item.purchase_price')}}</th>
                  <th>{{ __('item.selling_price')}}</th>
                  <th>{{ __('item.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                  <tr role="row" class="odd">                  
                    <td class="sorting_1">1</td>
                    <td>Photo</td>
                    <td>Coca Cola</td>
                    <td>0001</td>
                    <td>Drink</td>
                    <td>100</td>
                    <td>3</td>
                    <td>3.5</td>
                    <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-flat">{{ __('item.actions')}}</button>
                      <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('manage_item/2/edit') }}"><i class="fa fa-edit"></i>{{ __('item.button_edit_item')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('manage_item/show') }}"><i class="fa fa-print"></i>{{ __('item.button_print_item')}}</a></li>
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