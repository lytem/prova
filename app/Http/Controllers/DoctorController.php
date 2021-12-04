<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\DoctorRequest;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Doctor::class, 'doctor');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query=$request->input('query','');
        $items=Doctor::orderby('cognome','ASC');
        $conta=0;
        if ($query) {
            $items=$items->where('cognome','LIKE','%'.$query.'%');
            $conta=$items->count();
        }
        else{
            $items=$items->get();
        }

        return view('Doctors.index',compact('items','query','conta'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorRequest $request)
    {


        if(!$doctor = Doctor::where('codice_fiscale',$request->input('doctor.codice_fiscale'))->first()) {
            $doctor = Doctor::create($request->input('doctor'));
        }
        return redirect()->route('doctors.index')->with('message', $doctor->wasRecentlyCreated ? "dottore creato" : "Dottore già presente");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('doctors.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDoctorRequest  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {


        if(Doctor::where('codice_fiscale',$request->input('doctor.codice_fiscale'))->count()==0) {
            $doctor->update($request->input('doctor'));
        }
        else{
            return redirect()->route('doctors.index')->with('message',"Questo dottore esiste gia");
        }
        return redirect()->route('doctors.index')->with('message',"dottore modificato");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor , Request $request)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')->with('message',"cancellazione riuscita");
    }
}
