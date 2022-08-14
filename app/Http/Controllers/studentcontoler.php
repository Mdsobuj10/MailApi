<?php

namespace App\Http\Controllers;

use App\Mail\sentmail;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Notifications\sendnotification;
use Symfony\Contracts\Service\Attribute\Required;

class studentcontoler extends Controller
{
    /* 
    index page all in array bain data  */
 public function index()
 {
    $student = student::all();
    return view('table',[
        'student' => $student
    ]);
 }
 /* data created in form  */
 public function create()
 {
    return view('index');
 }

/* 
data create all student */
public function store(Request $request)
{

    $this -> validate($request,[
        'name'  =>'required',
        'email'  =>'required|email',
        'cell'  =>'required',
        'username'  =>'required|min:6|max:10',
    ],[
      'name.required' => 'apnar name ar ghor ti porun korun '  
    ]);

if ($request -> hasFile('photo')) {
    $img = $request -> file('photo');
    $file_name = md5(time().rand()).'.'.$img -> clientExtension();
    $img  -> move(storage_path('app/public/student'), $file_name);
}else{
    $file_name = null;
}

  $student =  student::create([
        'name'       => $request -> name,
        'email'      => $request -> email,
        'cell'       => $request -> cell,
        'username'   => $request -> username,
        'photo'      => $file_name,
    ]);

    $data = [
             'name'       => $request -> name,
             'email'      => $request -> email,
             'cell'       => $request -> cell,
             'username'   => $request -> username,
             'photo'      => $file_name,
         ];
    $student ->notify( new sendnotification($data));

    /* 
    data array bain all data  */
    // $data = [
    //     'name'       => $request -> name,
    //     'email'      => $request -> email,
    //     'cell'       => $request -> cell,
    //     'username'   => $request -> username,
    //     'photo'      => $file_name,
    // ];
    // // mail confarm
    // Mail::to($request -> email) -> send(new sentmail($data));
   return back()-> with('success', 'student dara successfuly create');
}
/* single data show in all data */
public function show($id)
{
    $student = student::find($id);

     return view('single',[
        'student'  => $student
     ]);
}
public function destroy($id)
{
    $student = student::find($id);
     $student ->delete();
     return back();
}
public function edite($id)
{
    $student = student::find($id);
     return view('edite',[
        'edite_student'  => $student 
     ]);
}
public function update(Request $request,  $id)
{
    $update_data = student::find($id);
    if ($request -> hasFile('new_photo')) {
        $img = $request -> file('new_photo');
        $file_name = md5(time().rand()).'.'.$img -> clientExtension();
        $img  -> move(storage_path('app/public/student'), $file_name);

        unlink('storage/student/'. $update_data -> photo );
    }else{
        $file_name = $request -> old_photo;
    }
    $update_data -> update([
        'name'     => $request -> name,
        'email'    => $request -> email,
        'cell'     => $request -> cell,
        'username' => $request -> username,
        'photo'   =>   $file_name
    ]);
    return back() ->with('success', 'data update sucessfully');
}

}
