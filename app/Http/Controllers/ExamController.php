<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Requests\ExamRequest;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query=$request->input('query','');
        $items=Exam::orderby('nome','ASC');
        $cont=0;
        if ($query) {
           $items=$items->where('nome','LIKE','%'.$query.'%')->get();
           $cont=$items->count();
        }
        else{
            $items=$items->get();
        }
        return view('exams.index',compact('items','query','cont'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('exams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequest $request)
    {
        if(!$esame = Exam::where('nome',$request->input('esame.nome'))->first()) {
            $esame = Exam::create($request->input('esame'));
        }
        return redirect()->route('exams.index')->with('message', $esame->wasRecentlyCreated ? "esame creato" : "esame già presente");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        return view('exams.edit',compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(ExamRequest $request, Exam $exam)
    {
        if( Exam::where('nome',$request->input('exam.nome'))->count()==0) {
            $exam->update($request->input('exam'));
        }
        else{
            return redirect()->route('exams.index')->with('message',"questo esame esiste già");
        }
        return redirect()->route('exams.index')->with('message',"modifica eseguita corettamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect()->route('exams.index')->with('message',"cancellazione eseguita corettamente");
    }
}
