<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Session;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::orderBy('created_at', 'desc')->paginate(10);
    	return view('roles.index', ['role' => $role]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validatedData = $request->validate([
            'role_name' => 'required|max:100'
        ]);

        $role = new Role();
        $role->role_name = $request->role_name;
        $role->save();

        $permission = new Permission();
        $permission->role_id = $role->role_id;
        $permission->dashboard = $request->dashboard;
        $permission->customer = $request->customer;
        $permission->manage_customer = $request->manage_customer;

        $permission->supplier = $request->supplier;
        $permission->manage_supplier = $request->manage_supplier;

        $permission->employee = $request->employee;
        $permission->employee_role = $request->employee_role;
        $permission->manage_employee = $request->manage_employee;

        $permission->store = $request->store;
        $permission->manage_store = $request->manage_store;

        $permission->category = $request->category;         
        $permission->manage_category = $request->manage_category;
        $permission->manage_items = $request->manage_items;
        $permission->manage_tax = $request->manage_tax;

        $permission->purchase = $request->purchase;
        $permission->manage_purchase = $request->manage_purchase;
        $permission->purchase_history = $request->purchase_history;

        $permission->sales = $request->sales;
        $permission->manage_sales = $request->manage_sales;
        $permission->sales_history = $request->sales_history;
        $permission->store_list = $request->store_list;

        $permission->report = $request->report;
        $permission->sales_report = $request->sales_report;
        $permission->items_store = $request->items_store;
        $permission->user_accesslog = $request->user_accesslog;

        $permission->general_setting = $request->general_setting;
        $permission->save();
        \Session::put('info','Role has been inserted successfully!');
        return redirect('role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $permission = DB::table('permissions')->where('role_id', $id)->first();
        return view('roles.show',['role' => $role,'permission'=>$permission]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = DB::table('permissions')->where('role_id', $id)->first();
        return view('roles.edit',['role' => $role,'permission'=>$permission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'role_name' => 'required|max:100'
        ]);

        $role = Role::find($id);
        $role->role_name = $request->role_name;        
        $role->save();

        $permission = Permission::find($r);
        
        $permission->dashboard = $request->dashboard;
        $permission->customer = $request->customer;
        $permission->manage_customer = $request->manage_customer;

        $permission->supplier = $request->supplier;
        $permission->manage_supplier = $request->manage_supplier;

        $permission->employee = $request->employee;
        $permission->employee_role = $request->employee_role;
        $permission->manage_employee = $request->manage_employee;

        $permission->store = $request->store;
        $permission->manage_store = $request->manage_store;

        $permission->category = $request->category;         
        $permission->manage_category = $request->manage_category;
        $permission->manage_items = $request->manage_items;
        $permission->manage_tax = $request->manage_tax;

        $permission->purchase = $request->purchase;
        $permission->manage_purchase = $request->manage_purchase;
        $permission->purchase_history = $request->purchase_history;

        $permission->sales = $request->sales;
        $permission->manage_sales = $request->manage_sales;
        $permission->sales_history = $request->sales_history;
        $permission->store_list = $request->store_list;

        $permission->report = $request->report;
        $permission->sales_report = $request->sales_report;
        $permission->items_store = $request->items_store;
        $permission->user_accesslog = $request->user_accesslog;

        $permission->general_setting = $request->general_setting;
        $permission->save();
        \Session::put('info','Role has been updated successfully!');
        return redirect('role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \Session::put('info','Role has been deleted successfully!');
        return redirect('role');
    }
}
