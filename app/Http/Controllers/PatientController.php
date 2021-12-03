<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\PatientRequest;
use App\Models\Doctor;

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
        $query=$request->input('query','');

        $items=Patient::orderby('cognome','ASC');

        if ($query) {
            $items=$items->where('cognome','LIKE','%.'.$query.'%');
        }
        $items=$items->get();
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
        if (!$patient=Patient::where('codic_fiscale',$request->input('codice_fiscale'))->first()) {
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
        $patient->update($request->input('patient'));
        return redirect()->route('patients.index')->with('message','paziente modificato');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect('/clinica/patients');
    }
}
