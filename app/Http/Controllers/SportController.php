<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sport;

class SportController extends Controller
{
    public function index()
    {
        $Sports=Sport::all();
        return response()->json($Sports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $rules=[
         'name'=>'Required',
         'description'=>'Required',
        ];
        try {
            $request->validate($rules);
        } catch(\Illuminate\Validation\ValidationException $e){
            return response()->json($e->errors(),422);
        }
        $sport=Sport::create(
            [
            'name'=>$request->name,
            'description'=>$request->description,
            
            ]
            );
        return response()->json($sport);
    }
     

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $sport=Sport::find($id);
      return response()->json([
        'message'=>'listo',
        'Sport'=>$sport
      ]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'user_id'=>'Required',
            'username'=>'Required',
            
        ];
        try {
            $request->validate($rules);
        } catch(\Illuminate\Validation\ValidationException $e){
            return response()->json($e->errors(),420);
        }
        $sport=Sport::find($id);

        $sport->update(
            [
                'user_id'=>$request->user_id,
                'username'=>$request->username,
                
            ]
            );
        return response()->json($sport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
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
        $sport=Sport::find($id);
        $sport->delete();

        return response()->json('eliminado');
    }
}