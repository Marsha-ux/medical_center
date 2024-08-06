<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Validator;
use App\Models\doctor;
use App\Models\rate;
use App\Models\specialization;
use Illuminate\Http\Request;


class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors=doctor::orderBy('id','DESC')->paginate();

        return view ('doctors.index',compact('doctors'));
    }

    public function home(){
        $doctors=doctor::orderBy('id','DESC')->paginate();
        $specialization=specialization::orderBy('id','DESC')->paginate();
        //dd($specialization);
        $ratings = rate::all();
        return view ('home',compact('doctors','specialization','ratings'));
    //     $sum=0;
    //     $counter=0;
    //    foreach ( $ratings as $rate )
    //    {
    //     $sum=$sum+$rate;
    //     $counter++;
    //    }
    //    $rate=$sum/$counter;
    //    return view ('home',compact('doctors','specialization','rate'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $specializations=specialization::orderBy('id','DESC')->paginate();
        return view ('doctors.create',['specializations'=>$specializations]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data= $request->validate([

            'name'=>['required','string','min:2','max:50'],
            'email'=>['required','email','unique:users,email'],
          'specialization_id'=>['required','integer','exists:specializations,id'],


           ]);
          doctor::create($data);
           return back()->with('success','Data added successfully');

        }
//



    /**
     * Display the specified resource.
     */
    public function show(doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor=doctor::findOrFail($id);
        $specializations=specialization::orderBy('id','DESC')->paginate();
        return view ('doctors.edit',['doctor'=>$doctor,'specializations'=>$specializations]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $doctor=doctor::find($id);

        $data= $request->validate([

            'name'=>['required','string','min:2','max:50'],
          'email'=>['required','email'],
         'specialization_id'=>['required','integer','exists:specializations,id'],

           ]);



           doctor::where('id',$id)->update($data);
             return redirect()->route('doctors.index')->with('success','Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor=Doctor::findOrFail($id);
        $doctor->delete();
        return back()->with('success','Data Deleted successfully');
    }
}
