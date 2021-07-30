<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Store;
use Session;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::orderBy('created_at', 'desc')->paginate(10);
        return view('store.index', ['store' => $store]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store = new Store();
        $store->store_code = $request->store_code;
        $store->store_name = $request->store_name;
        $store->telephone = $request->store_telephone;
        $store->email = $request->store_email;
        $store->address = $request->store_address;

        //photo
        $fileimg = $request->file('file');
        if (!empty($fileimg)) {
           $name = md5($fileimg->getClientOriginalName() . time()) . '.' . $fileimg->getClientOriginalExtension();
           $img = Image::make($fileimg->path());
           $img->resize(300, 300);
           //medium image
           $medium = '/store/' . $name;
           $img->save(storage_path() . $medium);
           $store->store_logo =  $name;
        } else {
            $store->store_logo = 'default.jpg';
        }

        $store->save();
        return redirect('store')->with('success', $request->store_name. ' Information has been added.');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('store.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::find($id);
        return view('store.edit', ['store' => $store]);
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
        $store = Store::find($id);
        $store->store_code = $request->store_code;
        $store->store_name = $request->store_name;
        $store->telephone = $request->store_telephone;
        $store->email = $request->store_email;
        $store->address = $request->store_address;

        //photo
        $fileimg = $request->file('file');
        if (!empty($fileimg)) {
           $name = md5($fileimg->getClientOriginalName() . time()) . '.' . $fileimg->getClientOriginalExtension();
           $img = Image::make($fileimg->path());
           $img->resize(300, 300);
           //medium image
           $medium = '/store/' . $name;
           $img->save(storage_path() . $medium);
           $store->store_logo =  $name;
        } else {
            $store->store_logo = 'default.jpg';
        }
        $store->save();
        // redirect
        // Session::flash('success', $request->store_name. ' Information has been updated.'); 
        return redirect('store')->with('success', $request->store_name. ' Information has been updated.');


        // return redirect('store')->with('success', $request->store_name. ' Information has been added.');  
  
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
