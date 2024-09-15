<?php

namespace App\Http\Controllers;

use App\Models\author;
use App\Models\Scopes\activeScope;
use Illuminate\Http\Request;
use Str;

class AuhtorController extends Controller
{
    /**
     * Display a listing of the resource.
     */ 
    public function index()
    {

            $user = author::withoutGlobalScopes(['userdetails'])->get(['name','city']);

        //$user = author::with('books:buyCount,author_id')->get();
        // $user = author::where('id','>','2')->withWhereHas('books',function($query){
        //                  $query->whereRaw('buyCount > 100');
     //   })->get();
        return $user;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $title= "New one NewPort";
        // $user = author::create([
        //     'name'=> $title,           
        //     'city'=> 'Mumbai'
        // ]);

        // $user->books()->create([
        //     'booksName'=> 'Go To Hell',
        //     'buyCount'=> 70,
            
        // ]);
        $user = author::find(5)->delete();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       
    }
}
