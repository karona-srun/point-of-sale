@extends('layouts.app_cpanal')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('vender/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <style>
    .store_logo{
      width: 60px;
      height: 60px;
      border-radius: 50%;
    }
    .fa{
      font-size:16px !important;
    }
  </style>
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
        @include('message/flash-message')  
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header panal-primary">
              <h3 class="box-title"><i class="fa fa-list"></i> {{ __('item.list_item')}}</h3>
              <!-- <a href="{{ url('manage_item/create')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-plus"></i> {{ __('item.button_create_item')}}
              </a> -->
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
                @foreach($item as $key => $item)
                  <tr role="row" class="odd">                  
                    <td class="sorting_1">{{ $key + 1 }}</td>
                    <td><img src="{{ route('item',$item-> photo)}}" class="store_logo" alt="" srcset=""></td>
                    <td>{{ $item->item }}</td>
                    <td>{{ $item->item_code }}</td>
                    <td>{{ $item->category_id }}</td>
                    <td>{{ $item->quanlity}}</td>
                    <td>{{ $item->purchase_price }}</td>
                    <td>{{ $item->sell_price }}</td>
                    <td>
                      <a href="{{ URL::to('manage_item/show/'.$item->item_id) }}" class="btn btn-sm btn-default"><i class="fa fa-ellipsis-h"></i></a>
                      <a href="{{ URL::to('manage_item/edit/'.$item->item_id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a>                      
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