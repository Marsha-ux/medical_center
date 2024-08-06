<?php
######################
# Created by backend # 
# Deveolper          # 
#           Qusai    #
#                    #
######################
namespace App\Http\Controllers;
use Illuminate\Validation\Rule;

use Illuminate\Http\Request;
use App\Models\Patient;
use Illuminate\Validation\Validator;
class PatientController extends Controller {
    public function index() {
        $patientsFromDB = Patient::all();
        //dd($patientsFromDB);
        return view('patients.index', ['patients' => $patientsFromDB]);
    }

    public function show(Patient $patient) {
        //$singlePatientFromDB = Patient::findOrfail($id);
        // dd($singlePatientFromDB);
        // if (is_null($singlePatientFromDB)) {
        //     return to_route('patients.index');
        // }

       // $singlePatientFromDB = Patient::findOrfail($email)->first();
        return view('patients.show', ['patient' => $patient]);
    }

    public function create() {

        return view('patients.create');
    }

    public function store(Request $request) {
        // $data = $request->all();
        $validated=$request->validate ([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' =>'required|unique:patients',
           
        ]);
        
        $name   = $request->name;
        $age    = $request->age;
        $gender = $request->gender;
        $phone  = $request->phone;
        $email  = $request->email;
        

        // $patient = new patient;
        // $patient->name = $name;
        // $patient->age = $age;
        // $patient->gender = $gender;
        // $patient->phone = $phone;
        // $patient->email = $email;
        // $patient->reservation_at = $reservation_at;
        // $patient->save();
        Patient::create([
            'name' => $name,
            'age' => $age,
            'gender' => $gender,
            'phone' => $phone,
            'email' => $email ,
        ]);
        
        return redirect()->route('patients.index');
    }

    public function edit(Patient $patient) {
        //$singlePatientFromDB = Patient::findOrfail($patient);
        // if (is_null($singlePatientFromDB)) {
        //      return to_route('patients.index');
        //  }
        return view('patients.edit', ['patient' => $patient]);
    }
    
    public function update($postId,Request $request) {
        $validated=$request->validate ([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' =>'required|unique:patients',
           
        ]);
        //$data = request()->all();

        $name = request()->name;
        $age = request()->age;
        $gender = request()->gender;
        $phone = request()->phone;
        $email = request()->email;


        $singlepPostFromDB = Patient::find($postId);
        $singlepPostFromDB->update([
                 'name' => $name,
                 'age' => $age,
                 'gender' => $gender,
                 'phone' => $phone,
                 'email' => $email,
        ]); 
        return redirect()->route('patients.show', $singlepPostFromDB->id);
    }

    public function search(Request $request) {
        //$email = $request->('email');
        $email = request()->email;
        //dd($request);
        $patient = Patient::where('email', $email)->first();

        if (!$patient) {
            return redirect()->route('patients.index')->with('error', 'Patient not Found!');
        }
        return view('patients.show', ['patient' => $patient]);
    }

    public function destroy(Patient $patient) {
        $patient->delete();

        return redirect()->route('patients.index')->with('success',
         'Patient has been Delete successfully.');
    }
}