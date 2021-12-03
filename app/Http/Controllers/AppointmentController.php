<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Appointment::get();
        $doctor=Doctor::get();
        $patient=Patient::get();
        return view('appointments.index',compact('items','doctor','patient'));
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
        if(!$appointment = Appointment::where('data',$request->input('appointment.data'))->first()) {
            $appointment = Appointment::create($request->input('appointment'));
        }


        return redirect()->route('appointments.index')->with('message', $appointment->wasRecentlyCreated ? "appuntamento creato" : "appuntamento già presente");

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
        $appointment->delete();
        return redirect('/clinica/appointments');
    }
}
