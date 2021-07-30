@extends('layouts.app_cpanal')

@section('css')
  
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
<div class="box-header panal-primary">
              <a href="{{ url('employee')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-plus"></i> {{ __('employee.list_employee')}}
              </a>
            </div>

<section class="content">
    <div class="row">         
    <div class="col-md-12">        
      <div class="box box-primary">
        <div class="box-header with-border">
          <span class="panel-title"><span class="fa fa-edit"></span> {{ __('employee.button_create_employee')}}</span>
            </div>
           
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="{{ URL::to('employee/update',$employee->employee_id) }}" method="post" enctype="multipart/form-data">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">            
            <div class="row">
            <div class="col-md-9">
              <div class="box-body">
                <!-- Firstname  -->
                <div class="form-group">                
                  <label  class="col-sm-3 control-label">{{ __('employee.firstname')}} :</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="firstname"  placeholder="{{ __('employee.firstname')}}" value="{{$employee->firstname}}">
                  </div>
                </div>
                <!-- / Firstname -->
                <!-- Lastname  -->
                <div class="form-group">                
                  <label  class="col-sm-3 control-label">{{ __('employee.lastname')}} :</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="lastname" placeholder="{{ __('employee.lastname')}}" value="{{$employee->lastname}}">
                  </div>
                </div>
                <!-- / Lastname -->
                <!-- Gender  -->
                <div class="form-group">
                  <label  class="col-sm-3 control-label">{{ __('employee.gender')}} :</label>
                  <div class="col-sm-9">
                  <select class="form-control" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  </div>
                </div> 
                <!-- / Gender --> 
                <!-- Birthdate  -->
                <div class="form-group">
                  <label  class="col-sm-3 control-label">{{ __('employee.birthdate')}} :</label>
                  <div class="col-sm-9">
                    <input type="text" name="bod" class="form-control pull-right" id="datepicker" placeholder="{{ __('employee.birthdate')}} (mm/dd/yyyy)" value="{{$employee->bod}}">
                  </div>
                </div> 
                <!-- / Gender --> 
                <!-- Telephone  -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">{{ __('employee.telephone')}} :</label>
                  <div class="col-sm-9">
                    <input type="text" name="telephone" class="form-control" placeholder="{{ __('employee.telephone')}}" value="{{$employee->telephone}}">
                  </div>
                </div> 
                <!-- / Telephone  -->
                <!-- Email  -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">{{ __('employee.email')}} :</label>
                  <div class="col-sm-9">
                    <input type="text" name="email" class="form-control"  placeholder="{{ __('employee.email')}}" value="{{$employee->email}}">
                  </div>
                </div> 
                <!-- / Email  --> 
                <!-- Address  -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">{{ __('employee.address')}} :</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="address" rows="3" placeholder="{{ __('employee.address')}}">{{$employee->address}}</textarea>
                  </div>
                </div> 
                <!-- / Address  -->  

                <!-- Role  -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">{{ __('employee.role')}} :</label>
                  <div class="col-sm-9">
                  <select class="form-control" name="role_id">                  
                    <option value="0" >None</option>
                    @foreach ($role as $key => $role) 
                      <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                    @endforeach
                  </select>
                  </div>
                </div> 
                <!-- / Role  -->   
                <!-- Salary  -->
                <div class="form-group">
                  <label  class="col-sm-3 control-label">{{ __('employee.salary')}} :</label>
                  <div class="col-sm-9">
                    <input type="text" name="salary" class="form-control" placeholder="{{ __('employee.salary')}}" value="{{$employee->salary}}">
                  </div>
                </div> 
                <!-- Salary  -->
                <!-- Store  -->
                <div class="form-group">
                  <label for="inputRole" class="col-sm-3 control-label">{{ __('employee.store')}} :</label>
                  <div class="col-sm-9">
                  <select class="form-control" name="store_id">
                  <option value="0" >None</option> 
                    @foreach ($store as $key => $store) 
                      <option value="{{ $store->store_id }}">{{ $store->store_name }}</option>
                    @endforeach
                  </select>
                  </div>
                </div> 
                <!-- / Store  -->                    
                <!-- CV  -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">{{ __('employee.cv')}} :</label>
                  <div class="col-sm-9">
                    <input type="file" name="cv" class="form-control"  placeholder="{{ __('employee.cv')}}">
                  </div>
                </div> 
                <!-- / CV  -->   
                <!-- Status  -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">{{ __('employee.status')}} :</label>
                  <div class="col-sm-9">
                  <select class="form-control" name="status">
                    <option value="Start" >Start</option> 
                    <option value="Working" >Working</option> 
                    <option value="Stop" >Stop</option>
                  </select>  
                  </div>
                </div> 
                <!-- / Status  -->
                <!-- Department  -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">{{ __('employee.department')}} :</label>
                  <div class="col-sm-9">
                    <input type="text" name="department" class="form-control" placeholder="{{ __('employee.department')}}" value="{{$employee->department}}">
                  </div>
                </div> 
                <!-- / Department  -->                      
                <!-- Description  -->
                <div class="form-group">
                  <label class="col-sm-3 control-label">{{ __('employee.description')}} :</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="description" rows="3" placeholder="{{ __('employee.description')}}">{{$employee->description}}</textarea>
                  </div>
                </div> 
                <!-- / Description  --> 
              </div>
            </div>
            <div class="col-md-2" style="margin-top:10px">
              <label class="control-label" style="margin-bottom:10px;">{{ __('employee.profile')}} :</label> 
              <img src="{{route('store_avatars','default.jpg')}}" id="image-tag" name="avatar" width="120" height="150" />
              <input type="button" class="btn btn-primary wallpaper col-sm-9" id='wallpaper'  style="margin-top:10px; widt:130px;" value="Browse">
              <input type="file"  class="btn btn-primary btn-block browse col-sm-9" name="image" id="wallpaper-image" style="display: none;" >
            </div>
            </div>
            <div class="box-footer">
              <input type="submit" class="btn col-md-1 btn-primary" value="{{ __('app.button_save')}}"/>
            </div>
            <!-- /.box-footer -->
          </form>
        </div>
      </div>
    </div>
    <!--/.col (right) -->
  </div>
</section>
@endsection
@section('js')
<script>
  $("#wallpaper").click(function(){
      $("#wallpaper-image").trigger('click');    
    });
  
    $("#wallpaper-image").change(function(){
        readURL(this);
    });
    

function readURL(input) {
  if (input.files && input.files[0]) {
      var reader = new FileReader();
      
      reader.onload = function (e) {
          $('#image-tag').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
  }
  }
</script>
@endsection