<?php

namespace App\Http\Controllers\Api;
use App\Model\Section;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Section::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'section_name' => 'required|unique:sections|max:25',
        ]);

        //$data = Subject::
        $data = new Section();
        $data->class_id = $request->class_id;
        $data->section_name = $request->section_name;
        $data->save();
        return response('Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Section::findorfail($id);
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
            'section_name' => 'required|unique:sections|max:25',
        ]);

        //$data = Subject::
        $data = Section::findorfail($id);
        $data->class_id = $request->class_id;
        $data->section_name = $request->section_name;
        $data->save();
        return response('Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Section::where('id',$id)->delete();
        return response('Data Deleted Successfully');
    }
}
