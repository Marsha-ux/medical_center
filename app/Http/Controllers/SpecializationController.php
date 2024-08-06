<?php

namespace App\Http\Controllers;

use App\Models\specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Specializations=specialization::orderBy('id','DESC')->paginate();
        return view ('specialization.index',compact('Specializations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('specialization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([

            'name'=>['required','string','min:2','max:50'],


           ]);
           specialization::create($data);
           return back()->with('success','Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(specialization $specialization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(specialization $specialization)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, specialization $specialization)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Specialization=specialization::findOrFail($id);
        $Specialization->delete();
        return back()->with('success','Data Deleted successfully');
    }
}
