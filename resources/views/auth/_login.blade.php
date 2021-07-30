<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Point Of Sale System</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('vender/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/pos.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/theme-blue.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/morris/morris.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/bootstrap-daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/font-awesome/css/font-awesome.min.css') }}">
  <!-- Toggle language -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquerysctipttop.css') }}">
  <!-- / Toggle Language -->
  <style>
        @font-face {
            font-family: "KhmerOS_battambang";
            src: url({{url('font/KhmerOS_battambang.woff')}}) format("truetype");
        }
        html, body {
            height: 0 !important;
        }
        .login-logo {
            font-family: "KhmerOS_battambang";
            font-size:24px;
        }
        .btn, p, input{
            font-family: "KhmerOS_battambang";
            font-size:15px;
        }

    </style>
</head>
<body class="hold-transition login-page">
    @if(App()->getLocale() == 'en')
        <input type="checkbox" class="language" checked data-toggle="toggle" data-onstyle="primary">       
    @else
        <input type="checkbox" class="language" data-toggle="toggle" data-onstyle="primary">   
    @endif
<div class="login-box">
  <div class="login-logo">
    <a href="/"><b> {{ __('app.pos')}}</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">{{ __('app.txt_intro')}}</p>

    <form method="POST" action="{{ route('login') }}">
    @csrf
      <div class="form-group has-feedback">
        <input type="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('app.txt_email') }}">
        @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ __('app.txt_password') }}">
        @if ($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
      </div>
      <div class="row">        
        <div class="col-xs-4">      
          <button type="submit" class="btn btn-primary btn-block btn-flat"> {{ __('app.button_login')}}</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script src="{{ asset('vender/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vender/jquery-ui/jquery-ui.min.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Toggle Language -->
<script src="{{ asset('js/bootstrap-toggle.js') }}"></script>
<script type="text/javascript" src="{{asset('js/jquery3.3.1.min.js')}}"></script>
<!-- / Toggle Language -->
<script src="{{ asset('vender/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vender/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('vender/morris/morris.min.js') }}"></script>
<script src="{{ asset('vender/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('vender/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('vender/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('vender/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('vender/moment/moment.min.js') }}"></script>
<script src="{{ asset('vender/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vender/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('vender/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<script src="{{ asset('vender/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('vender/fastclick/fastclick.js') }}"></script>
<script src="{{ asset('js/pos.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
<script>
 $(function() {  
   
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $('.toggle-on').on( 'click', function(e){
    var lang = 'kh';
      $.ajax({
        url : "{{route('language')}}",
        type : 'post',
        data : {locale:lang},
        success : function(data){
          if(data=='ok'){
            window.location.reload();
          }
        }
      })
    });

    $('.toggle-off').on( 'click', function(e){
    var lang = 'en';
      $.ajax({
        url : "{{route('language')}}",
        type : 'post',
        data : {locale:lang},
        success : function(data){
          if(data=='ok'){
            window.location.reload();
          }
        }
      })
    });
  });

</script> 
</body>
</html>
