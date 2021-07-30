<!-- Left side column. contains the logo and sidebar -->
<!-- sidebar: style can be found in sidebar.less -->
<?php 
  $sg1 = Request::segment(1);
  $sg2 = Request::segment(2);
  $customer = array('customer','manage_customer');
  $supplier = array('supplier','manage_supplier');
  $employee = array('employee','role','employee');
  $store = array('store','manage_store');
  $manage_item = array('manage_item','manage_category', 'manage_items', 'manage_tax');
  $purchase = array('purchase','manage_purchase','manage_history');
  $sales = array('manage_sale','sale_history','store_list');
  $reports = array('sale_report','items_report','users_log');
  $general_setting = array('manage_users','user_role');
  ?>
<section class="sidebar">
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">{{ __('app.main_navigation') }}</li>
    <li class="{{Request::path() == '/' ? 'treeview active' : ''}}">
      <a href="{{url('/')}}">          
      <i class="fa fa-dashboard"></i> <span> {{ __('app.dashboard') }}</span>
      </a>
    </li>
   
    <!-- / Menu Customer -->
    <li class="treeview <?php if (in_array($sg1, $customer)) { echo 'active'; } ?>">
      <a href="#" onclick="isExpanded(this)" state="false" id="m4">
      <i class="fa fa-users"></i>
      <span> {{ __('app.customer') }}</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($sg1 == 'customer') echo 'active'; ?>">
          <a href="{{url('customer')}}"><i class="fa fa-circle-o"></i>  {{ __('app.manage_customer') }}</a>
        </li>
      </ul>
    </li>   
    <!-- End Menu Customer -->
    
    <!-- / Menu Supplier -->
    <li class="treeview <?php if (in_array($sg1, $supplier)) { echo 'active'; } ?>">
      <a href="#" onclick="isExpanded(this)" state="false" id="m4">
      <i class="fa fa-truck"></i>
      <span> {{ __('app.supplier') }}</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($sg1 == 'supplier') echo 'active'; ?>">
          <a href="{{url('supplier')}}"><i class="fa fa-circle-o"></i>  {{ __('app.manage_supplier') }}</a>
        </li>
      </ul>
    </li>   
    <!-- End Menu Supplier -->

    <!-- / Menu Employee -->
    <li class="treeview <?php if (in_array($sg1, $employee)) { echo 'active'; } ?>">
      <a href="#" onclick="isExpanded(this)" state="false" id="m4">
      <i class="fa fa-users"></i>
      <span> {{ __('app.employee') }}</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($sg1 == 'role') echo 'active'; ?>">
          <a href="{{url('role')}}"><i class="fa fa-circle-o"></i>  {{ __('app.employee_role') }}</a>
        </li>
        <li class="<?php if($sg1 == 'employee') echo 'active'; ?>">
          <a href="{{url('employee')}}"><i class="fa fa-circle-o"></i>  {{ __('app.manage_employee') }}</a>
        </li>
      </ul>
    </li>   
    <!-- End Menu Employee -->
   
    <!-- / Menu Store -->
    <li class="treeview <?php if (in_array($sg1, $store)) { echo 'active'; } ?>">
      <a href="#" onclick="isExpanded(this)" state="false" id="m4">
      <i class="fa fa-shopping-cart"></i>
      <span> {{ __('app.store') }}</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($sg1 == 'store') echo 'active'; ?>">
          <a href="{{url('store')}}"><i class="fa fa-circle-o"></i>  {{ __('app.manage_store') }}</a>
        </li>
      </ul>
    </li>   
    <!-- End Menu Store -->
    
    <!-- / Menu Items -->
    <li class="treeview <?php if (in_array($sg1, $manage_item)) { echo 'active'; } ?>">
      <a href="#" onclick="isExpanded(this)" state="false" id="m4">
      <i class="fa fa-shopping-cart"></i>
      <span> {{ __('app.manage_items') }}</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($sg1 == 'manage_category') echo 'active'; ?>">
          <a href="{{url('manage_category')}}"><i class="fa fa-circle-o"></i> {{ __('app.manage_category') }}</a>
        </li>
        <li class="<?php if($sg1 == 'manage_item') echo 'active'; ?>">
          <a href="{{url('manage_item')}}"><i class="fa fa-circle-o"></i> {{ __('app.manage_items') }}</a>
        </li>
        <li class="<?php if($sg1 == 'manage_tax') echo 'active'; ?>">
          <a href="{{url('manage_tax')}}"><i class="fa fa-circle-o"></i>  {{ __('app.manage_tax') }}</a>
        </li>
      </ul>
    </li>   
    <!-- End Menu Items -->
  
    <!-- / Menu Purchase -->
    <li class="treeview <?php if (in_array($sg1, $purchase)) { echo 'active'; } ?>">
      <a href="#" onclick="isExpanded(this)" state="false" id="m4">
      <i class="fa fa-cubes"></i>
      <span> {{ __('app.purchase') }}</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($sg1 == 'manage_purchase') echo 'active'; ?>">
          <a href="{{url('manage_purchase')}}"><i class="fa fa-circle-o"></i> {{ __('app.manage_purchase') }}</a>
        </li>
        <li class="<?php if($sg1 == 'purchase_history') echo 'active'; ?>">
          <a href="{{url('purchase_history')}}"><i class="fa fa-circle-o"></i> {{ __('app.purchase_history') }}</a>
        </li>
      </ul>
    </li>   
    <!-- End Menu Purchase -->
  
    <!-- / Menu Sales -->
    <li class="treeview <?php if (in_array($sg1, $sales)) { echo 'active'; } ?>">
      <a href="#" onclick="isExpanded(this)" state="false" id="m4">
      <i class="fa fa-bookmark-o"></i>
      <span> {{ __('app.sales') }}</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($sg1 == 'manage_sale') echo 'active'; ?>">
          <a href="{{url('manage_sale')}}"><i class="fa fa-circle-o"></i> {{ __('app.manage_sale') }}</a>
        </li>
        <li class="<?php if($sg1 == 'sale_history') echo 'active'; ?>">
          <a href="{{url('sale_history')}}"><i class="fa fa-circle-o"></i> {{ __('app.sale_history') }}</a>
        </li>
        <li class="<?php if($sg1 == 'store_list') echo 'active'; ?>">
          <a href="{{url('store_list')}}"><i class="fa fa-circle-o"></i>  {{ __('app.store_list') }}</a>
        </li>
      </ul>
    </li>   
    <!-- End Menu Sales -->

     <!-- / Menu Reports -->
    <li class="treeview <?php if (in_array($sg1, $reports)) { echo 'active'; } ?>">
      <a href="#" onclick="isExpanded(this)" state="false" id="m4">
      <i class="fa fa-file-text-o"></i>
      <span> {{ __('app.reports') }}</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($sg1 == 'sales_report') echo 'active'; ?>">
          <a href="{{url('sales_report')}}"><i class="fa fa-circle-o"></i> {{ __('app.sale_report') }}</a>
        </li>
        <li class="<?php if($sg1 == 'items_report') echo 'active'; ?>">
          <a href="{{url('items_report')}}"><i class="fa fa-circle-o"></i> {{ __('app.items_report') }}</a>
        </li>
        <li class="<?php if($sg1 == 'user_accesslog') echo 'active'; ?>">
          <a href="{{url('user_accesslog')}}"><i class="fa fa-circle-o"></i>  {{ __('app.user_accesslog') }}</a>
        </li>
      </ul>
    </li>   
    <!-- End Menu Reports -->
    
    <!-- / Menu General Setting -->
    <li class="treeview <?php if (in_array($sg1, $general_setting)) { echo 'active'; } ?>">
      <a href="#" onclick="isExpanded(this)" state="false" id="m4">
      <i class="fa fa-gears"></i>
      <span> {{ __('app.general_setting') }}</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
        <li class="<?php if($sg1 == 'manage_users') echo 'active'; ?>">
          <a href="{{url('manage_users')}}"><i class="fa fa-users"></i>  {{ __('app.users') }}</a>
        </li>
        <li class="<?php if($sg1 == 'manage_users') echo 'active'; ?>">
          <a href="{{url('manage_users')}}"><i class="fa fa-circle-o"></i>  {{ __('app.employee_role') }}</a>
        </li>
        <li class="<?php if($sg1 == 'manage_users') echo 'active'; ?>">
          <a href="{{url('manage_users')}}"><i class="fa fa-circle-o"></i>  {{ __('app.users_log') }}</a>
        </li>
      </ul>
    </li>   
    <!-- End Menu General Setting -->
  </ul>
</section>
<!-- /.sidebar -->