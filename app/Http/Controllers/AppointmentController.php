<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\AppointmentRequest;
use App\Models\Department;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;


class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Appointment::class, 'appointment');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info("viewing appointments",['query'=>$request->input('query'),'user'=>Auth::user()->email]);

        $query=$request->input('query','');

        $items=Appointment::orderby('data','ASC');

        $patient=Patient::orderby('cognome','ASC');



        if ($query) {

            $items = Appointment::whereRelation('patient', 'cognome','LIKE','%'.$query.'%')
                                ->orwhererelation('patient', 'nome','LIKE','%'.$query.'%')->get();

        }
        else{
            $items=$items->get();
        }
        $doctor=Doctor::get();
        $department=Department::get();

        return view('appointments.index',compact('items','doctor','patient','query','department'));
    }
    public function appointmentsDoctor($doctorId){

        $appointment=Appointment::orderby('ora','ASC')->get();
        $doctor=Doctor::find($doctorId);

        $items=$doctor->appointment()->get();
        return view('appointments.appointmentsDoctor',compact('doctor','items','appointment'));
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
        $exam=Exam::get();
        $department=Department::get();
        return view('appointments.create',compact('doctor','patient','exam','department'));
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
        if(!$appointment = Appointment::where('data',$request->input('appointment.data'))
                                      ->where('ora',$request->input('appointment.ora'))->first())
        {
            $appointment = Appointment::create($request->input('appointment'));
        }
        return redirect()->route('appointments.index')->with('message', $appointment->wasRecentlyCreated ? "appuntamneto creato" : "appuntamneto già presente");

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
        $exam=Exam::get();
        $department=Department::get();
        return view('appointments.edit',compact('doctor','patient','appointment','exam','department'));

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
        if( Appointment::where('data',$request->input('appointment.data'))
                         ->where('ora',$request->input('appointment.ora'))->count()==1) {
            $appointment->update($request->input('appointment'));
        }
        else{
            return redirect()->route('appointments.index')->with('message',"appuntamento non disponibile");
        }
        return redirect()->route('appointments.index')->with('message',"modifica eseguita corettamente");
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
        return redirect()->route('appointments.index')->with('message',"cancelazione eseguita corettamente");


    }
}
