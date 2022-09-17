<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;

class ClassesController extends Controller
{
    public function index(Request $request)
    {
        $data['classes'] = SchoolClass::with('childrens')->latest()->paginate(10)->withQueryString();
        return view('classes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classes.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|alpha|max:300',
            'seat'     => 'required',
            'description'   => 'required',
        ]);

        $data = $request->except('_token');
        $class = SchoolClass::create($data);
       
        notify()->success('Class add successfully');
        return redirect()->route('classes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['class'] = SchoolClass::with('childrens')->find(base64_decode($id));
        return view('classes.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['class'] = SchoolClass::find(base64_decode($id));
        return view('classes.form', $data);
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
        $request->validate([
            'name'    => 'required|alpha|max:300',
            'seat'     => 'required',
            'description'   => 'required',
        ]);

        $class = SchoolClass::find($id);

        $data = $request->except(['_method', '_token']);


        $class->update($data);


        notify()->success('Class successfully updated');
        return redirect()->route('classes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = SchoolClass::find(base64_decode($id));
        $class->delete();
        notify()->success('Class successfully deleted');
        return back();
    }
}
