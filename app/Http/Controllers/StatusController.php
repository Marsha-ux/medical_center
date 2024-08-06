<?php

namespace App\Http\Controllers;

use App\Models\status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("status/add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=[
            'reservation_id'=>$request->reservation_id,
            'medicine'=>$request->medicine,
            	'ill'=>$request->ill,
                'analysis'=>$request->analysis];
        status::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $status=status::findOrFail($d);
        return view('status.edit',['status'=>$status]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, status $status)
    {
        $data=[
            'reservation_id'=>$request->reservation_id,
            'medicine'=>$request->medicine,
            	'ill'=>$request->ill,
                'analysis'=>$request->analysis];
                $status=status::findOrFail($d);
                $status->update[$data];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(status $status)
    {
        $res=status::FindOrFail($id)  ;
        $res->delete();
    }
}
