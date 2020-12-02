<?php

namespace App\Http\Controllers;

use App\Materias;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $materia;
     public function __construct (Materias $materia) {
         $this->materia = $materia;
     } function index()
    {
        $materias=Materias::all();
        return response()->json(['materias'=> $materias]);
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
        $materias = new Materias;
        $materias->create($request->all());
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $id=Materias::find($id);
        return ($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function edit(Materias $materias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Materias::find($id)->update($request->all());

        return  $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Materias  $materias
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $materias = Materias::find($id);
        $materias->delete();
        return "El registro se elimino con existo";
    }
}
