@extends('layouts.app_cpanal')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('vender/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <style>
    .photo{
      width: 60px;
      height: 60px;
      border-radius: 50%;
    }
    .status{
      padding: 6px 15px 6px 15px;
      position: absolute;
    }
  </style>
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.employee')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="employee" class="active">Employee</a></li>
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
              <h3 class="box-title"><i class="fa fa-list"></i> {{ __('employee.list_employee')}}</h3>
              <a href="{{ url('employee/create')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-plus"></i> {{ __('employee.button_create_employee')}}
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>{{ __('employee.employee_no')}}</th>
                  <th>{{ __('employee.profile')}}</th>
                  <th>{{ __('employee.employee_name')}}</th>
                  <th>{{ __('employee.email')}}</th>
                  <th>{{ __('employee.address')}}</th>
                  <th>{{ __('employee.telephone')}}</th>
                  <th>{{ __('employee.account')}}</th>
                  <th>{{ __('employee.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($emp as $key => $emp)
                  <tr role="row" class="odd">   
                    <td>{{ $key + 1 }}</td>   
                    <td>
                    <img src="{{route('store_avatars',$emp-> image)}}" class="photo" alt="photo" />
                    </td>            
                    <td>{{ $emp->firstname }} {{ $emp->lastname }}</td>
                    <td>{{ $emp->email }}</td>
                    <td>{{ $emp->address }}</td>
                    <td>{{ $emp->telephone }}</td>
                    <td>
                    @if($emp->status == "Start")
                      <p class="label label-warning status"> {{$emp->status}}</p>
                    @elseif($emp->status == "Working")
                      <p class="label label-primary status"> {{$emp->status}}</p>
                    @else
                      <p class="label label-danger status"> {{$emp->status}}</p>
                    @endif
                    </td>
                    <td>
                    <div class="btn-group">
                      <button type="button" class="btn btn-primary btn-flat">{{ __('employee.actions')}}</button>
                      <button type="button" class="btn btn-primary btn-flat dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::to('employee/edit/'.$emp->employee_id) }}"><i class="fa fa-edit"></i>{{ __('employee.button_edit_employee')}}</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('employee/show'.$emp->employee_id) }}"><i class="fa fa-print"></i>{{ __('employee.button_print_employee')}}</a></li>
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