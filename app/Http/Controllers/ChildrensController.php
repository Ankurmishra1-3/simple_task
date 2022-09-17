<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Children;
use App\Models\SchoolClass;
use Auth;

class ChildrensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['childrens'] = Children::latest()->paginate(10)->withQueryString();
        return view('childrens.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['classes'] = SchoolClass::get();
        return view('childrens.form',$data);
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
            'age'     => 'required|numeric',
            'class_id'     => 'required|exists:school_classes,id',
        ]);

        $data = $request->except('_token');
        $data['user_id'] = Auth::id();
        $data['status'] = 1;
        $SchoolClass = SchoolClass::where('id',$request->class_id)->first();
        if($SchoolClass && $SchoolClass->seat < $SchoolClass->childrens->count()){
            $data['status'] = 2;
        }

        $children = Children::create($data);
       
        notify()->success('Children add successfully');
        return redirect()->route('childrens.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['children'] = Children::find(base64_decode($id));
        return view('childrens.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['classes'] = SchoolClass::get();
        $data['children'] = Children::find(base64_decode($id));
        return view('childrens.form', $data);
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
            'age'     => 'required|numeric',
            'class_id'     => 'required|exists:school_classes,id',
        ]);

        $children = Children::find($id);

        $data = $request->except(['_method', '_token']);
        $data['user_id'] = Auth::id();

        $children->update($data);


        notify()->success('Children successfully updated');
        return redirect()->route('childrens.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $children = Children::find(base64_decode($id));
        $children->delete();
        notify()->success('Children successfully deleted');
        return back();
    }

    public function ChangeStatus(Request $request)
    {
        $children = Children::find($request->children_id);
        if($children){
            $SchoolClass = SchoolClass::where('id',$children->class_id)->first();
            if($SchoolClass && $SchoolClass->seat < $SchoolClass->occupliedChildrens()){
                notify()->warning('Class seat is Full');
                return 0;
            }
            $children->update(['status' => $request->status]);
             notify()->success('Children In Roll successfully ');
             return 1;
        }
        return back();
    }

}
