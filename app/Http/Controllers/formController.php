<?php

namespace App\Http\Controllers;

use App\Http\Requests\authorRequest;
use App\Models\form;
use Illuminate\Http\Request;

class formController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = form::all('name','email','id','image_path');
        return view('show',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(authorRequest $req)
    {
       $path =  $req->file('photo')->store('images','public');

       $user = form::create([
        'name' =>$req->names,
        'email'=> $req->email,
        'image_path'=> $path
       ]);

       if($user){
        return redirect()->route('form.index')->with('status','Add Successfully');
       }else{
        echo "Some error are Came";
       }

       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = form::findOrFail($id);
        return view('edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
                'names'=>'required|string',
                'email'=>'required|email',
                
        ]);
        
        $deletes = form::find($id);

        if($request->hasFile('photo')){

            $image_path = public_path('storage/').$deletes->image_path;

            if(file_exists($image_path)){
                @unlink($image_path);
            }
          
            $path = $request->file('photo')->store('images','public');
           $user =  form::updateOrCreate(['name'=>$request->names,'email'=>$request->email],['name'=>$request->names,'email'=>$request->email,'image_path'=>$path]);
           return redirect()->route('form.create')->with('status','Updated Data');
        }

        $user =  form::where('id',$id)->update(['name'=>$request->names,'email'=>$request->email]);

        return redirect()->route('form.create')->with('status','Updated Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $user = form::where('id',$id)->delete();
       return redirect()->route('form.create')->with('delete','Delete Temporary ');
    }

    public function restorePage(){
        $user =   form::onlyTrashed()->get(['id','name','email','image_path']);
        return view('restore')->with('user',$user);
    }

    public function restoreDataPage($id){
        $user = form::onlyTrashed()->where('id',$id)->restore();
        return redirect()->route('form.restore')->with('status','Restore Successfull');
    }
    public function forceDelete($id){
       //  $user = form::onlyTrashed()->where('id',$id)->first();
        // $path = public_path('storage/').$user->image_path;
        // return $user;
        $user = form::onlyTrashed()->where('id',$id)->first();
        $user->forceDelete();
     return redirect()->route('form.restore')->with('delete','Delete Successfull');
    }
}
