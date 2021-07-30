@extends('layouts.app_cpanal')

@section('css')
  
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
            <a href="{{ url('store')}}" class="btn btn-social btn-primary pull-right">
                <i class="fa fa-angle-left"></i> {{ __('store.list_store')}}
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa  fa-print"></i> {{ __('store.button_create_store')}}
            </div>
            
          </div>
        </div>
    </div>
</section>
@endsection
@section('js')

@endsection