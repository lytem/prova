<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info("viewing appointments",['query'=>$request->input('query'),'user'=>Auth::user()->email]);
        $query=$request->input('query','');
        $items=Appointment::get();
        $patient=Patient::orderby('cognome','ASC');
        if ($query) {
            $patient=$patient->where('patient.cognome','LIKE','%'.$query.'%');
        }
        $doctor=Doctor::get();

        return view('appointments.index',compact('items','doctor','patient'));
    }
    public function appointmentsDoctor($doctorId){

        $appointment=Appointment::orderby('ora','ASC')->get();
        $doctor=Doctor::find($doctorId);

        $items=$doctor->appointment()->get();
        return view('appointments.appointmentsDoctor',compact('doctorId','items','appointment'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $doctor=Doctor::get();
        $patient=Patient::get();
        return view('appointments.create',compact('doctor','patient'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        Log::info("creating appointment");
        $notfound= false;
        if(Appointment::where('data',$request->input('appointment.data'))->where('ora',$request->input('appointment.ora'))->count()==0)
        {
            Appointment::create($request->input('appointment'));
            $notfound=true;
        }
        return redirect()->route('appointments.index')->with('message', $notfound ? "appuntamento creato" : "appuntament gia riservato");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $doctor=Doctor::get();
        $patient=Patient::get();
        return view('appointments.edit',compact('doctor','patient','appointment'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(AppointmentRequest $request, Appointment $appointment)
    {
        Log::info("updating appointment",['id'=>$appointment->id,'user'=>Auth::user()->email]);
        $appointment->update($request->input('appointment'));

        return redirect('/clinica/appointments');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        Log::info("deleting appointment",['id'=>$appointment->id]);
        $appointment->delete();
        return redirect('/clinica/appointments');
    }
}
