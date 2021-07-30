@extends('layouts.app_cpanal')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('vender/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <style>
  .fa{
    font-size: 16px !important;
  }
  .no{
    width:10px !important;
  }
  .category{
    width:100px !important;
  }
  .description{
    width:100px !important;
  }
  .action{
    width:10px !important;
  }
  </style>
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.manage_category')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="manage_category" class="active">Category</a></li>
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
              <h3 class="box-title"><i class="fa fa-list"></i> {{ __('category.list_category')}}</h3>
              <a href="{{ url('manage_category/create')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-plus"></i> {{ __('category.button_create_category')}}
              </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="no">{{ __('category.category_no')}}</th>
                  <th class="category">{{ __('category.category')}}</th>
                  <th class="description">{{ __('category.description')}}</th>
                  <th class="action">{{ __('category.actions')}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($category as $key => $category)
                  <tr role="row" class="odd">                  
                    <td class="sorting_1">{{ $key + 1 }}</td>
                    <td>{{ $category->category }}</td>
                    <td>{{ $category->category }}</td>
                    <td>
                    <a href="{{ URL::to('manage_category/edit/'.$category->category_id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i></a> | 
                    <!-- <a href="{{ URL::to('manage_category/show/'.$category->category_id) }}"><i class="fa fa-print"></i></a> | -->
                    <a href="{{ URL::to('manage_category/destroy/'.$category->category_id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>
@endsection