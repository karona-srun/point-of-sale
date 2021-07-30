@extends('layouts.app_cpanal')

@section('css')
  
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
            <a href="{{ url('role')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-angle-left"></i> {{ __('role.list_role')}}
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa  fa-print"></i> {{__('role.button_show_role')}}</h3>
            </div>
            <div class="box-body">
                <!-- Role  -->
                <div class="form-group">                
                    <label for="inputEmail3" class="col-sm-3 control-label">{{ __('role.role_name')}} :</label>
                    <div class="col-sm-9">
                      <label>{{ $role->role_name}}</label>
                    </div>
                </div>
                <!-- / Role -->
                <hr/>
                <!-- Dashboard  -->
                <div class="form-group">                
                    <label for="inputEmail3" class="col-sm-3 control-label">{{ __('app.dashboard')}} :</label>
                    <div class="col-sm-9">
                      <label>{{ $permission->dashboard == '0' ? 'Allow' : 'Not Allow'    }} </label>
                    </div>
                </div>
                <!-- / Dashboard -->
                <!-- Customer  -->
                <div class="form-group">                
                    <label for="inputEmail3" class="col-sm-3 control-label">{{ __('app.customer')}} :</label>
                    <div class="col-sm-9">
                      <label>{{ $permission->customer == '0' ? 'Allow' : 'Not Allow'    }} </label>
                    </div>
                </div>
                <!-- / Customer -->
                <!-- Manage Customer  -->
                <div class="form-group">                
                    <label for="inputEmail3" class="col-sm-3 control-label">{{ __('app.manage_customer')}} :</label>
                    <div class="col-sm-9">
                      <label>{{ $permission->manage_customer == '0' ? 'Allow' : 'Not Allow'    }} </label>
                    </div>
                </div>
                <!-- / Manage Customer -->
                <!-- Supplier  -->
                <div class="form-group">                
                    <label for="inputEmail3" class="col-sm-3 control-label">{{ __('app.supplier')}} :</label>
                    <div class="col-sm-9">
                      <label>{{ $permission->supplier == '0' ? 'Allow' : 'Not Allow'    }} </label>
                    </div>
                </div>
                <!-- / Supplier -->
                <!-- Manage Supplier  -->
                <div class="form-group">                
                    <label for="inputEmail3" class="col-sm-3 control-label">{{ __('app.manage_supplier')}} :</label>
                    <div class="col-sm-9">
                      <label>{{ $permission->manage_supplier == '0' ? 'Allow' : 'Not Allow'    }} </label>
                    </div>
                </div>
                <!-- / Manage Supplier -->
            </div>
          </div>
        </div>
    </div>
</section>
@endsection
@section('js')

@endsection