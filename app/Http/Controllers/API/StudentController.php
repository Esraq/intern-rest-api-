<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::all();
        return $students;
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
        $this->validate($request,[

          
          
            'name'=>'required|min:1', 
            'email' => 'required|min:1',
            
            'cgpa' => 'required|min:1',
           

             'phone'=>'required|min:1',

             'address'=>'required|min:1',


             ]);

        $student=new Student;
         
        $student->name=$request->get('name');
        $student->email=$request->get('email');
      
        $student->cgpa=$request->get('cgpa');

        $student->phone=$request->get('phone');

        $student->address=$request->get('address');

        $student->save();

        return response("data inserted");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student =Student::find($id);
        return $student;
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
         $form_data = array(

            'name'  =>   $request->name,
            'email' =>   $request->email,
            'cgpa'  =>   $request->cgpa,
            'phone' =>   $request->phone,
            'address'=>   $request->address,
            
        
        );


      Student::whereId($id)->update($form_data);

        return response("updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = \App\Models\Student::find($id);
        $student->delete();
        return response("deleted");
    }
}
