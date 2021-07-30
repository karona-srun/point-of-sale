<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Items;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Items::orderBy('created_at', 'asec')->paginate(10);
        return view('manage_items.manage_item.index',compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::get();
        return view('manage_items.manage_item.create',['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Items();
        $item -> item_code = $request -> item_code;
        $item -> item = $request -> item;
        $item -> category_id = $request-> category;
        $item -> purchase_price =  (float)$request -> purchase_price;
        $item -> purchase_id =  '0';
        $item -> sell_price = (float)$request -> sell_price;
        $item -> discount =  (float)$request -> discount;
        $item -> quanlity = (int)$request -> quanlity;
        //photo
        $fileimg = $request->file('photo');
        if (!empty($fileimg)) {
           $name = md5($fileimg->getClientOriginalName() . time()) . '.' . $fileimg->getClientOriginalExtension();
           $img = Image::make($fileimg->path());
           $img->resize(300, 300);
           //medium image
           $medium = '/item/' . $name;
           $img->save(storage_path() . $medium);
           $item -> photo =  $name;
        } else {
            $item -> photo = 'default.jpg';
        }
        $item->save();      
        \Session::put('info','Item has been inserted successfully!');  
        return redirect('manage_item');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('manage_items.manage_item.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = items::find($id);
        $category = Category::get();
        return view('manage_items.manage_item.edit',['items'=>$items,'category'=>$category]);
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
        $item = Items::find($id);
        $item -> item_code = $request -> item_code;
        $item -> item = $request -> item;
        $item -> category_id = $request-> category;
        $item -> purchase_price =  (float)$request -> purchase_price;
        $item -> purchase_id =  '0';
        $item -> sell_price = (float)$request -> sell_price;
        $item -> discount =  (float)$request -> discount;
        $item -> quanlity = (int)$request -> quanlity;
        //photo
        $fileimg = $request->file('photo');
        if (!empty($fileimg)) {
           $name = md5($fileimg->getClientOriginalName() . time()) . '.' . $fileimg->getClientOriginalExtension();
           $img = Image::make($fileimg->path());
           $img->resize(300, 300);
           //medium image
           $medium = '/item/' . $name;
           $img->save(storage_path() . $medium);
           $item -> photo =  $name;
        } else {
            $item -> photo = 'default.jpg';
        }
        $item->save();    
        \Session::put('info','Item has been updated successfully!');      
        return redirect('manage_item');
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
