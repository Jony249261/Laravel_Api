<?php

namespace App\Http\Controllers\Api;
use App\Model\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Student::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $validateData=$request->validate([
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required|max:25',
            'email' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'photo' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ]);

        //$data = Subject::
        $data = new Student();
        $data->class_id = $request->class_id;
        $data->section_id = $request->section_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = Hash::make($request->password);
        $data->photo = $request->photo;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->save();
        return response('Student Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Student::findorfail($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validateData=$request->validate([
            'class_id' => 'required',
            'section_id' => 'required',
            'name' => 'required|max:25',
            'email' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'photo' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ]);

        //$data = Subject::
        $data = Student::findorfail($id);
        $data->class_id = $request->class_id;
        $data->section_id = $request->section_id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->password = Hash::make($request->password);
        $data->photo = $request->photo;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->save();
        return response('Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::where('id',$id)->first();
        $img_path = $data->photo;
        unlink($img_path);
        Student::where('id',$id)->delete();
        return response('Data Deleted Successfully');
    }
}
