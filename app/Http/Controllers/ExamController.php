<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Requests\ExamRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ExamController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Exam::class, 'exam');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info("viewing exams",['query'=>$request->input('query'),'user'=>Auth::user()->email]);
        $query=$request->input('query','');
        $items=Exam::sortable();

        if ($query) {
           $items=$items->where('nome','LIKE','%'.$query.'%')->get();

        }
        else{
            $items=$items->get();
        }
        return view('exams.index',compact('items','query'));

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
        Log::info("creating exam",['user'=>Auth::user()->email]);
        if(!$exam = Exam::where('nome',$request->input('exam.nome'))->first()) {
            $exam = Exam::create($request->input('exam'));
        }
        return redirect()->route('exams.index')->with('message', $exam->wasRecentlyCreated ? "Esame creato" : " Esame già presente");

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
        Log::info("updating exam",['id'=>$exam->id,'user'=>Auth::user()->email]);
        /*if( Exam::where('nome',$request->input('exam.nome'))->count()==0) {

        }
        else{
            return redirect()->route('exams.index')->with('message',"questo esame esiste già");
        }*/
        $exam->update($request->input('exam'));
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
        Log::info("deleting exam",['id'=>$exam->id,'user'=>Auth::user()->email]);
        $exam->delete();
        return redirect()->route('exams.index')->with('message',"cancellazione eseguita corettamente");
    }
}
