<?php

namespace App\Http\Controllers;
use App\Models\Opinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    public function newComment(Request $request)
    {
        $opinion = Opinion::find($request->input('opinionid'));

        if($opinion != null)
        {
            $opinion->comments()->attach(Auth::user(),['comment' => $request->input('newcomm'),'points' => $request->input('points')]);
            return redirect(route('topics.show',$opinion->topic))->with('message','Commentaire ajouté !');
        }
        else
        {
            return redirect(route('themes.index'))->with('message','Error : Opinion not found !');
        }

    }
}
