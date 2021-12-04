<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\Request;
use App\Http\Requests\SpecialtyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info("viewing specialties",['query'=>$request->input('query'),'user'=>Auth::user()->email]);
        $query=$request->input('query','');
        $items=Specialty::orderby('nome','ASC');
        $cont=0;
        if ($query) {
           $items=$items->where('nome','LIKE','%'.$query.'%')->get();
           $cont=$items->count();
        }
        else{
            $items=$items->get();
        }
        return view('specialties.index',compact('items','query','cont'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SpecialtyRequest $request)
    {
        Log::info("creating specialty",['user'=>Auth::user()->email]);
        if(!$specialita = Specialty::where('nome',$request->input('specialita.nome'))->first()) {
            $specialita = Specialty::create($request->input('specialita'));
        }
        return redirect()->route('specialties.index')->with('message', $specialita->wasRecentlyCreated ? "specialita creato" : "specialita già presente");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        return view('specialties.edit',compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(SpecialtyRequest $request, Specialty $specialty)
    {
        Log::info("deleting specialty",['id'=>$specialty->id,'user'=>Auth::user()->email]);
        if( Specialty::where('nome',$request->input('specialty.nome'))->count()==0) {
            $specialty->update($request->input('specialty'));
        }
        else{
            return redirect()->route('specialties.index')->with('message',"questa specialita esiste già");
        }
        return redirect()->route('specialties.index')->with('message',"modifica eseguita corettamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
        Log::info("deleting specialty",['id'=>$specialty->id,'user'=>Auth::user()->email]);
        $specialty->delete();
        return redirect()->route('specialties.index')->with('message',"cancellazione eseguita corettamente");
    }
}
