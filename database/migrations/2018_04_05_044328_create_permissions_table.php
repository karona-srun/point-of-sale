<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('permission_id');
            $table->integer('role_id');
            $table->boolean('dashboard');

            $table->boolean('customer');
            $table->boolean('manage_customer');

            $table->boolean('supplier');
            $table->boolean('manage_supplier');

            $table->boolean('employee');            
            $table->boolean('employee_role');
            $table->boolean('manage_employee');

            $table->boolean('store');            
            $table->boolean('manage_store');
            
            $table->boolean('category');
            $table->boolean('manage_category');
            $table->boolean('manage_items');
            $table->boolean('manage_tax');

            $table->boolean('purchase');
            $table->boolean('manage_purchase');
            $table->boolean('purchase_history');

            $table->boolean('sales');
            $table->boolean('manage_sales');
            $table->boolean('sales_history');
            $table->boolean('store_list');

            $table->boolean('report');
            $table->boolean('sales_report');
            $table->boolean('items_store');
            $table->boolean('user_accesslog');
            
            $table->boolean('general_setting');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
