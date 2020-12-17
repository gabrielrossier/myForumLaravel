<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reference;
use App\Http\Controllers\DB;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $references = Reference::all();
        return view ('references.index')->with(compact('references'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('references.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $ref = new Reference();
        $ref->id = null;
        $ref->description = $request->input('description');
        $ref->url = $request->input('url');
        $ref->save();
        $references = Reference::all();
        return view ('references.index')->with(compact('references'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $reference = Reference::find($id);
        return view ('references.show')->with(compact('reference'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $reference = Reference::find($id);
        return view ('references.update')->with(compact('reference'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $reference = Reference::find($id);
        $reference->description = $request->input('description');
        $reference->url = $request->input('url');
        $reference->save();
        $request->session()->flash('message',"Modification enregistrée");
        return view ('references.show')->with(compact('reference'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $reference = Reference::find($id);
        $reference->delete();
        return redirect(route('references.index'))->with('message','Référence supprimée');
    }
}
