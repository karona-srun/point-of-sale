<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Store;
use App\Employee;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use DB;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('employee.index',['emp'=>$emp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::get();
        $store = Store::get();
        return view('employee.create',['role' => $role,'store' => $store]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $this->validate($request, [
            'image'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg',
        ]);
        $emp = new Employee();
        $emp->firstname = $request->firstname;
        $emp->lastname = $request->lastname;
        $emp->gender = $request->gender;
        $emp->bod = $request->bod;
        $emp->telephone = $request->telephone;
        $emp->email = $request->email;
        $emp->address =  $request->address;
        $emp->role_id = $request->role_id;
        $emp->salary = $request->salary;
        $emp->store_id = $request->store_id;
        $fileimg = $request->file('file');
        $filecv = $request->file('cv');
        if (!empty($filecv)) {
           $name = md5($fileimg->getClientOriginalName() . time()) . '.' . $fileimg->getClientOriginalExtension();
           $img = Image::make($fileimg->path());
           $img->resize(300, 300);

           $namecv = md5($filecv->getClientOriginalName() . time()) . '.' . $filecv->getClientOriginalExtension();
           $cv = Image::make($filecv->path());
          
           
   
            $destinationPath = storage_path(). '/employee';
                $storeName =md5($filecv->getClientOriginalName() . time()) . '.' . $filecv->getClientOriginalExtension();
                // Store the file in the disk 
                $filecv->move($destinationPath, $storeName);
          
   
           //medium image
           $medium = '/employee/' . $name;
           $medium1 = '/employee/' . $storeName;
           $emp->image = "Null";
           $emp->cv = $storeName;
        } else {
            $emp->image ='default.jpg';
            $emp->cv ="Null";
        }
        $emp->status = $request->status;
        $emp->department = $request->department;
        $emp->description = $request->description;
    
        $emp->save();
        \Session::put('info','Employee has been inserted Successfully!!');
        return redirect('employee');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('employee.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $role = Role::get();
        $store = Store::get();
        $employee = DB::table('employees')->where('employee_id', $id)->first();
        return view('employee.edit',['employee'=>$employee ,'role' => $role,'store' => $store]);
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
        $this->validate($request, [
            'image'=>'required|image|mimes:jpeg,jpg,png,bmp,gif,svg',   
        ]);
        $emp = DB::table('employees')->where('employee_id', $id)->first();
        $emp->firstname = $request->firstname;
        $emp->lastname = $request->lastname;
        $emp->gender = $request->gender;
        $emp->bod = $request->bod;
        $emp->telephone = $request->telephone;
        $emp->email = $request->email;
        $emp->address =  $request->address;
        $emp->role_id = $request->role_id;
        $emp->salary = $request->salary;
        $emp->store_id = $request->store_id;
        $fileimg = $request->file('image');
        $filecv = $request->file('cv');
        if (!empty($filecv)) {
           $name = md5($fileimg->getClientOriginalName() . time()) . '.' . 'jpeg';
           $img = Image::make($fileimg->path());
           $img->resize(300, 300);

           $namecv = md5($filecv->getClientOriginalName() . time()) . '.' . $filecv->getClientOriginalExtension();
           $cv = Image::make($filecv->path());
   
            $destinationPath = storage_path(). '/employee';
                $storeName =md5($filecv->getClientOriginalName() . time()) . '.' . $filecv->getClientOriginalExtension();
                // Store the file in the disk 
                $filecv->move($destinationPath, $storeName);
          
   
           //medium image
           $medium = '/employee/' . $name;
           $medium1 = '/employee/' . $storeName;
           $emp->image = "Null";
           $emp->cv = $storeName;
        } else {
            $emp->image ='default.jpg';
            $emp->cv ="Null";
        }
        $emp->status = $request->status;
        $emp->department = $request->department;
        $emp->description = $request->description;
    
        $emp->save();

        \Session::put('info','Employee has been updated Successfully!!');
        return redirect('employee');
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
