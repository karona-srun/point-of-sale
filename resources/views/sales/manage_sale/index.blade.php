@extends('layouts.app_cpanal')

@section('css')
<link rel="stylesheet" href="{{ asset('vender/select2/css/select2.css') }}">
  <style>
    .item-avatar{
        cursor:pointer;
        width:100px;
        height:100px;
    }
    .fa{
        font-size:16px !important;
    }
    .add-cart{
        top: 90px;
        position: absolute;
        margin-left: 24px;
    }
    .form-control{
        height:30px;
    }
    .delete-item{
        margin-bottom: 5px;
    margin-top: 5px;
    }
    button{
        margin-left: 7%;
        height:30px;
    }
    .margin{
        width:50px;
        height:
    }
    .photo{
        width: 60px;
        height: 60px;
        border-radius: 5px;
        padding: 5px;
    }
    .photoModal{
        margin-left: 150px;
    }
    .modal-body{
        width: 300px !implement;
        height: 300px !implement;
        border-radius: 5px;
        padding: 5px;
    }
    .checkout{
        width: 200px;
        outline: none;
        border: 0;
        background-color: #fff !important;
    }
    .value{
        width: 50px;
        outline: none;
        border: 0;
        background-color: #fff !important;
    }
    .item{
        width: 100px;
    }
    .form-control-custom {
        height: 35px !important;
    }
  </style>
@endsection
@section('content')
<section class="content-header">
    <h1>
    {{ __('app.dashboard')}}
    <small>{{ __('app.manage_sale')}}</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="manage_sale" class="active">Manage Sale</a></li>
    </ol>
    
</section>
<section class="content">
<div class="row">
    <div class="col-md-5">
        <div class="box box-primary">
            <div class="box-header">
            <h3 class="box-title">{{ __('item.list_item')}}</h3>
            </div>
            <div class="box-body">
            <table class="table table-condensed order" id="order example1">
                <thead>
                    <tr>
                    <th style="width: 10px">No</th>
                    <th>Item</th>
                    <th>Price</th>
                    <th style="width: 80px">Quanlity</th>
                    <th style="width: 60px"><center>Action</center></th>
                    </tr>
                </thead>
            </table>
            <br>
            <div class="box box-primary">            
            <div class="box-body">
                <div class="form-group">
                    <label for="inputName" class="col-sm-5 control-label">Customer:</label>
                    <select class="form-control form-control-custom select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
                        <option value="0"> Select Customer </option>
                            @foreach($customer as $customer)
                                <option value="{{$customer->customer_id}}">{{$customer->customer_name}} | {{$customer->telephone}} | {{$customer->customer_type}}</option>
                            @endforeach
                    </select>     
                </div>
                <div class="form-group">
                    <label for="inputName" class="col-sm-5 control-label">Total Payment:</label>
                      <input type="text" class="col-sm-4 form-control checkout" id="total_payment"  disabled placeholder="$ 0.00">
                </div>
                <br>
                <div class="form-group">
                    <label for="inputName" class="col-sm-5 control-label" >Total Qty:</label>
                      <input type="text" class="col-sm-4 form-control checkout" id="total_qty"  disabled placeholder="0">
                </div>               
            </div>
            </div>
            <div class="form-group">
                    <button type="button" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Checkout</button>    
                </div>
            </div>   
        </div>
    </div>
    <div class="col-md-7">
        <div class="box box-primary">
            <div class="box-header">
                <div class="pull-left">
                <h3 class="box-title">{{ __('item.item')}}</h3>
                </div>
                <div class="pull-right">
                <label for="">{{ __('category.category')}}</label>
                <select name="category" id="category" class="form-control-custom">
                <option value="0"> -- Select Category -- </option>
                    @foreach($category as $key => $category)
                        <option value="{{ $category->category_id }} " seleted>{{ $category->category }}</option>                        
                    @endforeach
                </select>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-bordered" id="table example1" >
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>                   
                    @foreach($items as $key => $items)
                     
                    @endforeach    
                </table>
            </div>   
        </div>
    </div>
</div>

<!-- Modal Customer -->
<div id="myModalShow" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <p class="modal-title fa fa-list">&nbsp;&nbsp;Show Photo</p>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <img src="" class="photoModal" alt="" srcset="">
        </div>        
    </div>

  </div>
</div>
<!-- End Modal Customer -->

</section>

@endsection
@section('js')
<script src="{{ asset('vender/select2/js/select2.full.min.js')}}"></script>
<script>
$(document).ready(function(){
    var id = 1;
    $('.select2').select2()
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $('body').on('click','.photo',function(){
        $('#myModalShow').modal('show');
        var images = $(this).attr('src');
        $('.photoModal').attr('src',images);
    });
    
    $('body').on('click','.add-item ',function(){       
        console.log('select item by id '+ id +" | "+ $(this).attr("data-item").trim() +" | "+ $(this).attr("data-value") ); 
        
        $("#order").append('<tr>'
        +'<td class="id">'+id+'</td>'
        +'<td class="item">'+ $(this).attr("data-item").trim()+'</td>'
        +'<td><input type="text" class="form-control value" name="value" disabled value="'+$(this).attr("data-value")+'"/></td>'
        +'<td class="qty"><input type="text" class="form-control quanlity" name="quanlity" value="1" ></td>'
        +'<td>'+'<button class="btn btn-danger delete-item" id="delete-item"><i class="fa fa-trash"></i></button>'+'</td>'
        +'</tr>');   
        id++; 
        calculateQuanlity();     
        calculatePurchasePrice();  
    });

    $("#order").on('click','.delete-item',function(e){
        console.log('post category');
        $(this).closest('tr').remove();
        calculateQuanlity();     
        calculatePurchasePrice(); 
    });

    $("#category").change(function(){        
        var id=$(this).val();
        
        $('#table').find('tbody').empty(); 
            console.log('post category  id : '+id);
            $.ajax({
                type:'POST',
                url: '{{ url('category')}}',
                dataType:'json',
                data:{
                    _token: '{!! csrf_token() !!}',
                    id :id                 
                },
                success:function(datas){  
                    console.log(datas); 
                    $.each(datas,function(index,data){    
                        
                        $("#table").append('<tbody><tr>'
                        +'<td><img src=item/'+data.photo+' class="photo" /></td>'
                        +'<td class="item">'+data.item+'</td>'
                        +'<td class="sell_price">'+data.sell_price+'</td>'
                        +'<td>'+'<button type="button" id="add-item" class="btn btn-sm btn-primary add-item" data-item='+data.item+' data-value='+data.sell_price+' >Add Cart</button>'+'</td>'
                        +'</tr></tbody>');    
                    });                            
                },
                error: function(e) {
                    console.log(e.message);
                }           
            });
    });

    $("table").delegate(".quanlity","keyup", function () {
			calculateQuanlity();
	});

    $("table").delegate(".value","keyup", function () {
		calculatePurchasePrice();
    });

    function calculatePurchasePrice() {
		var sum = 0;
		//iterate through each textboxes and add the values
		$(".value").each(function () {
			//add only if the value is number
			if (!isNaN(this.value) && this.value.length != 0) {
					sum += parseFloat(this.value);
			}
		});
		//.toFixed() method will roundoff the final sum to 2 decimal places
		$("#total_payment").val('$ '+sum.toFixed(2));
	}
	function calculateQuanlity(){
		var sum = 0;
		//iterate through each textboxes and add the values
		$(".quanlity").each(function () {
			//add only if the value is number
			if (!isNaN(this.value) && this.value.length != 0) {
					sum += parseFloat(this.value);
			}
		});
		//.toFixed() method will roundoff the final sum to 2 decimal places
		$("#total_qty").val(sum);
	}
 });
</script>
@endsection
