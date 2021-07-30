@extends('layouts.app_cpanal')
@section('css')
<style>
   .add-record, .delete-record{
   height: 32px;
   }
</style>
<link rel="stylesheet" href="{{ asset('vender/select2/css/select2.css') }}">
@endsection
@section('content')
<section class="content-header">
   <h1>
      {{ __('app.dashboard')}}
      <small>{{ __('app.manage_purchase')}}</small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="manage_item" class="active">Manage Purchase</a></li>
   </ol>
</section>
<section class="content">
   <div class="row">
      <div class="col-xs-12">
         <a href="{{ url('manage_purchase')}}" class="btn btn-social btn-primary pull-right">
         <i class="fa fa-angle-left"></i> {{ __('purchase.list_purchase')}}
         </a>
      </div>
   </div>
   <br>
   <div class="row">
      <div class="col-xs-12">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">
               <i class="fa  fa-plus-square"></i> {{ __('purchase.button_create_purchase')}}
            </div>
            <form action="{{ URL::to('manage_purchase/store') }}" method="post" class="form-horizontal">
               <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
               <div class="box-body">
                  <!-- Paid By -->
                  <div class="form-group">
                     <label for="inputStore" class="col-sm-2 control-label">{{ __('purchase.paid_by')}} :</label>
                     <div class="col-sm-4">
                        <input type="text" class="form-control" name="paid_by" id="inputEmail3" placeholder="{{ __('purchase.paid_by')}}">
                     </div>
                  </div>
                  <!-- / Paid By -->                  
                  <!-- Supplier -->
                  <div class="form-group">
                     <label for="inputStore" class="col-sm-2 control-label">{{ __('app.supplier')}} :</label>
                     <div class="col-sm-4">
                        <select name="supplier" class="col-sm-12 select2">
                           @foreach($supplier as $supplier)
                           <option value="{{$supplier->supplier_id}}">{{$supplier->supplier_name}}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <!-- / Supplier -->
                  <!-- Date -->
                  <div class="form-group">
                     <label for="inputStore" class="col-sm-2 control-label">{{ __('purchase.date')}} :</label>
							<div class="col-sm-6">
								<div class="input-group date">
									<input type="text" name="date" class="form-control pull-right" id="datepicker" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="dd/mm/yyyy">
								</div>
							</div>
                  </div>
                  <!-- / Date -->
                  <div style="display:none;">
                     <table id="sample_table">
                        <tr class="data-contact-person tr_clone">
                           <td>  
                              <input type="text" name="item_code[]" class="form-control" />
                           </td>
                           <td>  
                              <input type="text" name="item[]" class="form-control" />
                           </td>
                           <td>
                              <select name="category[]" class="form-control select2" >
                              <option value="0"> Select Category </option>
                                 @foreach($category as $category)
                                 <option value="{{$category->category_id}}">{{$category->category}}</option>
                                 @endforeach
                              </select>
                           </td>
									<td>  
                              <input type="text" name="purchase_price[]" class="form-control purchase_price" />
                           </td>
                           <td>  
                              <input type="text" name="quanlity[]" class="form-control quanlity" />
                           </td>
                           <td><a class="btn btn-danger pull-right delete-record" data-added="0"><i class="fa fa-trash"></i></a>
                           </td>
                        </tr>
                     </table>
                  </div>
                  <table class="table" id="tbl_posts">
                     <thead>
                        <tr>
                           <th>{{ __('item.item_code')}}</th>
                           <th>{{ __('item.item')}}</th>
                           <th>{{ __('category.category')}}</th>
                           <th>{{ __('item.purchase_price')}}</th>
                           <th>{{ __('item.quanlity')}}</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody id="tbl_posts_body">
                        <tr id="rec-1">
                           <td>  
                              <input type="text" name="item_code[0]" class="form-control" />
                           </td>
                           <td>  
                              <input type="text" name="item[0]" class="form-control" />
                           </td>
                           <td>
                              <select name="category[0]" class="form-control select2" id="category">
                                 <option value="0"> Select Category </option>
                              </select>
                           </td>
                           <td>  
                              <input type="text" name="purchase_price[0]" class="form-control purchase_price" />
                           </td>
                           <td>  
                              <input type="text" name="quanlity[0]" class="form-control quanlity" />
                           </td>
                           </td>  
                           <td><a class="btn btn-primary add-record" data-id="1"><i class="fa fa-plus"></i></a></td>
                        </tr>
                     </tbody>
                  </table>
                  <!-- / Add Items -->
						<div class=" pull-right">
							<div class="form-group">
								<label for="inputStore" class="col-sm-5 control-label">{{ __('purchase.total_pay')}} :</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="total_payment" id="total_payment" placeholder="0.00">
								</div>
							</div>
							<div class="form-group">
								<label for="inputStore" class="col-sm-5 control-label">{{ __('purchase.total_qty')}} :</label>
								<div class="col-sm-7">
									<input type="text" class="form-control" name="total_qty" id="total_qty" placeholder="0.00">
								</div>
							</div>
							
						</div>
               </div>
               <!-- /.box-body -->
               <div class="box-footer">
                  <button type="submit" class="btn btn-info"> {{ __('app.button_save')}}</button>
               </div>
               <!-- /.box-footer -->
            </form>
            <!-- add  -->           
         </div>
      </div>
   </div>
</section>
@endsection
@section('js')
<script src="{{ asset('vender/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript">  
   $(document).ready(function () { 
        $('.select2').select2()
		$('#datepicker').datepicker({
			autoclose: true,
            format: 'dd/mm/yyyy'
        }) 
        $("#datepicker").datepicker().datepicker("setDate", new Date());
       $(document).delegate('a.add-record', 'click', function(e) {
           e.preventDefault();    
           var content = jQuery('#sample_table tr'),
           size = jQuery('#tbl_posts >tbody >tr').length + 1,
           element = null,    
           element = content.clone();
           element.attr('id', 'rec-'+size);
           element.find('.delete-record').attr('data-id', size);
           element.appendTo('#tbl_posts_body');
           element.find('.sn').html(size);
			  calculatePurchasePrice();
		calculateQuanlity();
       });
   
       $(document).delegate('a.delete-record', 'click', function(e) {
           e.preventDefault();    
           var didConfirm = confirm("Are you sure You want to delete");
           if (didConfirm == true) {
           var id = jQuery(this).attr('data-id');
           var targetDiv = jQuery(this).attr('targetDiv');
           jQuery('#rec-' + id).remove();
           
           //regnerate index number on table
           $('#tbl_posts_body tr').each(function(index) {
           //alert(index);
           $(this).find('span.sn').html(index+1);
           });
			  calculatePurchasePrice();
		calculateQuanlity();
           return true;
       } else {
           return false;
       }
       });
   
		$("table").delegate(".purchase_price","keyup", function () {
			calculatePurchasePrice();
		});

		$("table").delegate(".quanlity","keyup", function () {
			calculateQuanlity();
		});
		
        $(document).delegate('#category', 'click', function(e) {
            console.log('$.ajax(){}')
        });

		function calculatePurchasePrice() {
		var sum = 0;
		//iterate through each textboxes and add the values
		$(".purchase_price").each(function () {
			//add only if the value is number
			if (!isNaN(this.value) && this.value.length != 0) {
					sum += parseFloat(this.value);
			}
		});
		//.toFixed() method will roundoff the final sum to 2 decimal places
		$("#total_payment").val(sum.toFixed(2));
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