<?php

namespace App\Http\Controllers;

use App\Models\xml;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


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
        $fecha = $request->input('fecha');
        $rfc = $request->input('rfc');
        $razon_social = $request->input('razon_social');
        $producto = $request->input('producto');
        $importe = $request->input('importe');

        $xml = new xml;
        $xml->fecha = $fecha;
        $xml->rfc = $rfc;
        $xml->razon_social = $razon_social;
        $xml->producto = $producto;
        $xml->importe = $importe;
        $xml->save();

        return response()->json(['success'=>true,'message'=>'Datos guardados correctamente']);
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
