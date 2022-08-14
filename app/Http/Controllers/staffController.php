<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;

class staffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student_all_data = staff::all();
        return view('staff.table',[
            'student'  => $student_all_data
        ]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.index');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this ->validate($request,[
            'name'      =>'required',
            'email'     =>'required|email',
            'cell'      =>'required',
            'username'  =>'required',
          ]);

          if ($request ->hasFile('photo')) {
              $img =$request -> file('photo');
              $file_name = md5(time().rand()).'.'.$img -> clientExtension();
              $img -> move(storage_path('app/public/staff'),$file_name);
              
          }

          staff::create([
          'name'   => $request -> name,
          'email'   => $request -> email,
          'cell'   => $request -> cell,
          'username'   => $request -> username,
          'photo'   => $file_name
          ]);
          return back() -> with('success', 'data stuble successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff_data = staff::find($id);
        return view('staff.single',[
            'student'   => $staff_data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edite_data = staff::find($id);
        return view('staff.edite',[
            'edite_student'  => $edite_data
        ]);
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
        $update_data = staff::find($id);

      if ($request -> hasFile('new_photo')) {
        $img = $request -> file('new_photo');
        $file_name = md5(time().rand()).'.'. $img -> clientExtension();
        $img -> move(storage_path('app/public/staff'), $file_name);

        unlink('storage/staff/'. $update_data -> photo);

      } else {
         $file_name = $request -> old_photo;
      }
      

        $update_data -> update([
           'name'   => $request -> name, 
           'email'   => $request -> email, 
           'cell'   => $request -> cell, 
           'username'   => $request -> username, 
           'photo'   => $file_name, 
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $staff_data_delete = staff::find($id);
        $staff_data_delete ->delete();
        return back();

    }
}
