
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Point Of Sale System</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('vender/bootstrap/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/pos.css') }}">
  <link rel="stylesheet" href="{{ asset('css/theme-blue.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/morris/morris.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/bootstrap-daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vender/font-awesome/css/font-awesome.css') }}">
  <!-- Toggle language -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap-toggle.css') }}">
  <link rel="stylesheet" href="{{ asset('css/jquerysctipttop.css') }}">
  <!-- / Toggle Language -->
  @yield('css')
  <style>
        @font-face {
            font-family: "KhmerOS_battambang";
            src: url({{url('font/KhmerOS_battambang.woff')}}) format("truetype");
        }

        .main-header, 
        .content-header h1,
        .main-sidebar, 
        .content-wrapper,        
        .box-title,
        select {
            font-family: "KhmerOS_battambang";
            font-size:14px;
        }
        .logo-lg{
            font-family: "KhmerOS_battambang";
            font-size:16px;
        }

    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Slidebar Top Nevigation -->
  <header class="main-header">
    @include('layouts.slidebar_top')
  </header>
  <!-- Slidebar Menu Nevigation -->
  <aside class="main-sidebar">
    @include('layouts.slidebar_menu_nevigation')
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')    
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    @include('layouts.slidebar_footer')
  </footer>  
  <div class="control-sidebar-bg"></div>
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
  if ( $("html:lang(en)").length > 0 ) {
    $('#example1').DataTable( {
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "search": "Search ",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtered From _MAX_ Total records)"
        }
    } );
  }else{
    $('#example1').DataTable( {
        "language": {
            "lengthMenu": "បង្ហាញ _MENU_ ព័តមានក្នុងទំព័រ",
            "zeroRecords": "មិនមានព័តមានក្នុងការស្វែងទេ!",
            "info": "បង្ហាញទំព័រទី _PAGE_ នៃ _PAGES_",
            "search": "ស្វែងរក ",
            "infoEmpty": "មិនមានព័តមានក្នុងការស្វែងទេ!",
            "infoFiltered": "(ជ្រើសរើសយកចេញពី _MAX_ ព័តមាននៃសរុបព័តមាន)"
        }
    } );
  }
  function isExpanded(elm) {
        // current state of the clicked menu item
        $.cookie("menuId", $(elm).attr("id"));
        var state = $(elm).attr("state");
        // set other to false and arrow left
        $("a[state]").attr("state", "false");
        $("a[state] span.pull-right-container i.fa").attr("class", "fa fa-angle-left pull-right");
        if(state=="true")
        {
            $(elm).attr("state", "false");
            $.cookie("state", "false");
        }
       else{
            $(elm).attr("state", "true");
            $(elm).find("i.pull-right").attr("class", "fa fa-angle-down pull-right");
            $.cookie("state", "true");
        }
    }


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

  setTimeout(function() {
    $('.alert').fadeOut('fast');
  }, 5000);
  
 
</script>
@yield('js')
</body>
</html>
