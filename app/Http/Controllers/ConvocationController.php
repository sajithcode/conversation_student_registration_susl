<?php

namespace App\Http\Controllers;

use App\Models\Convocation;
use Illuminate\Http\Request;

class ConvocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convocations = Convocation::all();
        return view('convocation.edit',compact('convocations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('convocation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Convocation::create($request->all());
        return redirect()->route('convocation.index')
            ->with('success','New convocation added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convocation  $convocation
     * @return \Illuminate\Http\Response
     */
    public function show(Convocation $convocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convocation  $convocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Convocation $convocation)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convocation  $convocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convocation $convocation)
    {
        $convocation->update([
            'status'=>$request->input('status'),
        ]);
        return redirect()->route('convocation.index')
            ->with('success', 'Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convocation  $convocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convocation $convocation)
    {
        //
    }
}
