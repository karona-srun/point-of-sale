@extends('layouts.app_cpanal')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('vender/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
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
        @include('message/flash-message') 
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header panal-primary">
              <h3 class="box-title"><i class="fa fa-list"></i> {{ __('role.list_role')}}</h3>
              <a href="{{ url('role/create')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-plus"></i> {{ __('role.button_create_role')}}
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{{ __('role.role_no')}}</th>
                  <th>{{ __('role.role_name')}}</th>
                  <th>{{ __('role.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($role as $key => $roles) 
                  <tr role="row" class="odd">    
                    <td>{{ $key+1 }}</td>              
                    <td class="sorting_1">{{ $roles->role_name }}</td>  
                    <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-flat">{{ __('role.actions')}}</button>
                      <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('role/edit',$roles->role_id) }}"><i class="fa fa-edit"></i>{{ __('role.button_edit_role')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('role/show',$roles->role_id) }}"><i class="fa fa-print"></i>{{ __('role.button_show_role')}}</a></li>
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