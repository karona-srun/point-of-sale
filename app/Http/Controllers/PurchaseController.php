<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\Employee;
use App\Category;
use App\items;
use App\Purchase;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase = Purchase::orderBy('created_at', 'desc')->paginate(10);
        return view('purchase.manage_purchase.index',['purchase'=>$purchase]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::get();
        $employee = Employee::get();
        $category = Category::get();
        return view('purchase.manage_purchase.create',['supplier'=>$supplier,'employee'=>$employee,'category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase = new Purchase();
        $purchase->paid_by = $request->paid_by;
        $purchase->supplier_id = $request->supplier;
        $purchase->employee_id = '0';
        $purchase->total_payment = $request->total_payment;
        $purchase->total_qty = $request->total_qty;
        $purchase->date = $request->date;
        $purchase->description = 'description';
        $purchase->save();
       
        $input = $request->all();
        
        $condition = $input['item_code'];
        foreach ($condition as $key => $condition) {
            $items = new Items();
            $items->item_code = $input['item_code'][$key];
            $items->item = $input['item'][$key];
            $items->category_id = $input['category'][$key];
            $items->purchase_price = $input['purchase_price'][$key];
            $items->purchase_id = $purchase->purchase_id;
            $items->sell_price = '0';
            $items->discount = '0';
            $items->quanlity = $input['quanlity'][$key];
            $items->photo = '---';
            $items->save();
        }
        return redirect('manage_purchase')->with('message', 'Your purchase added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('purchase.manage_purchase.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('purchase.manage_purchase.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
