<?php

namespace App\Http\Controllers;

use App\Models\EligibleStudent;
use Illuminate\Http\Request;

class EligibleStudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eligibleStudents = EligibleStudent::latest()->paginate(10);
        return view('eligibleStudents.index',compact('eligibleStudents'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eligibleStudents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        EligibleStudent::create($request->all());
        return redirect()->route('eligibleStudents.index')
            ->with('success','Student add successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EligibleStudent  $eligibleStudent
     * @return \Illuminate\Http\Response
     */
    public function show(EligibleStudent $eligibleStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EligibleStudent  $eligibleStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(EligibleStudent $eligibleStudent)
    {
        return view('eligibleStudents.edit',compact('eligibleStudent'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EligibleStudent  $eligibleStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EligibleStudent $eligibleStudent)
    {
        $eligibleStudent->update([
            'nameWithInitials'=>$request->input('nameWithInitials'),
            'regNum'=>$request->input('regNum'),
            'indexNum'=>$request->input('indexNum'),
            'faculty'=>$request->input('faculty'),
            'department'=>$request->input('department'),
        ]);

        return redirect()->route('eligibleStudents.index')
            ->with('success','Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EligibleStudent  $eligibleStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(EligibleStudent $eligibleStudent)
    {
        //
        $eligibleStudent -> delete();
        return redirect()->route('eligibleStudents.index')
            ->with('success','Product deleted successfully');
    }
}
