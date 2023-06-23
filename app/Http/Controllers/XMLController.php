<?php

namespace App\Http\Controllers;

use App\Models\xml;
use Illuminate\Http\Request;



class XMLController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos =xml::all();
        return view('xml',compact('datos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha'=>'required',
            'rfc'=>'required',
            'razon_social'=>'required',
            'producto'=>'required|',
            'importe'=>'required',
            'id_partida'=>'required'


        ]);

        $xml = new xml;
        $xml->fecha=$request->fecha;
        $xml->razon_social=$request->rfc;
        $xml->producto=$request->producto;
        $xml->importe=$request->importe;
        $xml->id_partida=$request->id_partida;
        $xml->save();

        return back()->with('success','Concentrado validado con exito');

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    

}
