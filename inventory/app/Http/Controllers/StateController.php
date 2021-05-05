<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states=State::all();
        return view('states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('states.create');
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
        {						
            $request->validate([						
                'state_name'=>'required',						
                'city'=>'required'
                					
                					
            ]);						
                            
            $state = new State([						
                'state_name' => $request->get('state_name'),						
                'city' => $request->get('city')					
               						
            ]);						
            $state->save();						
            return redirect('/states')->with('success', 'State saved!');						
        }						

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
        $state = State::find($id);					
        return view('states.edit', compact('state'));
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
        $request->validate([						
            'state_name'=>'required',						
            'city'=>'required'					
           					
        ]);						
						
        $state = state::find($id);						
        $state->state_name =  $request->get('state_name');						
        $state->city = $request->get('city');						
       						
        $state->save();						
						
        return redirect('/states')->with('success', 'State updated!');	
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
        $state = State::find($id);			
        $state->delete();			
			
        return redirect('/states')->with('success', 'State deleted!');	
    }
}
