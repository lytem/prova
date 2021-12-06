<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Exam;
use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Department::class, 'department');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Log::info("viewing departments",['query'=>$request->input('query'),'user'=>Auth::user()->email]);
        $query=$request->input('query','');
        $items=Department::orderby('nome','ASC');

        if ($query) {
           $items=$items->where('nome','LIKE','%'.$query.'%')->get();

        }
        else{
            $items=$items->get();
        }
        return view('departments.index',compact('items','query'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('departments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest $request)
    {
        Log::info("creating department",['user'=>Auth::user()->email]);
        if(!$department = Department::where('nome',$request->input('department.nome'))->first()) {
            $department = Department::create($request->input('department'));
        }
        return redirect()->route('departments.index')->with('message', $department->wasRecentlyCreated ? "Reparto creato corettamente" : "Dipartimento già presente");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {


        return view('departments.edit',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest $request, Department $department)
    {
        Log::info("updating department",['id'=>$department->id,'user'=>Auth::user()->email]);
       /* if( Department::where('nome',$request->input('department.nome'))->count()==1) {

        }
        else{
            return redirect()->route('departments.index')->with('message',"questo reparto esiste già");
        }*/
         $department->update($request->input('department'));
        return redirect()->route('departments.index')->with('message',"modifica eseguita corettamente");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        Log::info("deleting department",['id'=>$department->id,'user'=>Auth::user()->email]);
        $department->delete();
        return redirect()->route('departments.index')->with('message','cancellazione riuscita');
    }
}
