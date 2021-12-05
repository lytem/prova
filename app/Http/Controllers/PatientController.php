<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PatientController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Patient::class, 'patient');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info("viewing patients",['query'=>$request->input('query'),'user'=>Auth::user()->email]);
        $query=$request->input('query','');

        $items=Patient::orderby('cognome','ASC');


       if($query) {
            $items=Patient::where('cognome','LIKE','%'.$query.'%')->orwhere('nome','LIKE','%'.$query.'%')->get();

        }
        else{
            $items=$items->get();
        }
        return view('Patients.index',compact('items','query'));
    }

    public function patientDoctor($doctorId){
        $patient=Patient::get();
        $doctor=Doctor::find($doctorId);

        $items=$doctor->patient()->get();

        return view('patients.patients_doctor',compact('patient','items','doctor'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctor=Doctor::get();
        return view('patients.create',compact('doctor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientRequest $request)
    {
        Log::info("creating patient",['user'=>Auth::user()->email]);
        if (!$patient=Patient::where('codice_fiscale',$request->input('patient.codice_fiscale'))->first()) {
            $patient=Patient::create($request->input('patient'));
        }

        return redirect()->route('patients.index')->with('message', $patient->wasRecentlyCreated ? "paziente creato" : "paziente già presente");



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        $doctor=Doctor::get();
        return view('Patients.edit',compact('patient','doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        Log::info("updating patient",['id'=>$patient->id,'user'=>Auth::user()->email]);

        if (Patient::where('codice_fiscale',$request->input('patient.codice_fiscale'))->count()==0) {
            //$patient=Patient::update($request->input('patient'));
            $patient->update($request->input('patient'));
        }
        else{
            return redirect()->route('patients.index')->with('message',"paziente già presente");
        }

        return redirect()->route('patients.index')->with('message', "paziente creato");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        Log::info("deleting patient",['id'=>$patient->id,'user'=>Auth::user()->email]);
        $patient->delete();

        return redirect()->route('patients.index')->with('message',"cancellazione riuscita");
    }
}
