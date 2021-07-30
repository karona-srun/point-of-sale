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
  </style>
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.store')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="store" class="active">Store</a></li>
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
              <h3 class="box-title"><i class="fa fa-list"></i> {{ __('store.list_store')}}</h3>
              <a href="{{ url('store/create')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-plus"></i> {{ __('store.button_create_store')}}
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{{ __('store.store_no')}}</th>
                  <th>{{ __('store.store_logo')}}</th>
                  <th>{{ __('store.store')}}</th>
                  <th>{{ __('store.email')}}</th>
                  <th>{{ __('store.telephone')}}</th>
                  <th>{{ __('store.address')}}</th>
                  <th>{{ __('store.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($store as $key => $stores) 
                <tr role="row" class="odd">  
                  <td class="sorting_1">{{$key + 1}}</td>   
                  
                  <td>
                  <img src="{{route('store_avatars',$stores-> store_logo)}}" class="store_logo" />
                  </td> 
                    <td>{{ $stores-> store_code }}</td>
                    <td>{{ $stores-> store_name }}</td>
                    <td>{{ $stores-> telephone }}</td>
                    <td>{{ $stores-> address }}</td>
                    <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-flat">{{ __('store.actions')}}</button>
                      <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('store/edit',$stores-> store_id) }}"><i class="fa fa-edit"></i>{{ __('store.button_edit_store')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('store/show',$stores-> store_id) }}"><i class="fa fa-print"></i>{{ __('store.button_print_store')}}</a></li>
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