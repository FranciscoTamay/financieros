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
        if($request->hasFile('archivo')){
            
            $archivo = $request->file('archivo');
            $rutaTemporal = $archivo->store('temp','public');

            $contenidoXML = Storage::disk('public')->get($rutaTemporal);

            $xml = new \SimpleXMLElement($contenidoXML);

            foreach ($xml->datos as $datos) {
                // Convertir la fecha al formato "DD/MM/AA"
                $fecha = $datos->Fecha;
                $fechaFormateada = date('d/m/y', strtotime($fecha));
                // rfc del emisor 
                $emisor = $datos->Receptor;
                $rfcEmisor = $emisor->Rfc;
                // nombre de la empresa
                $nombreEmpresa = $emisor->Nombre;
    
                $concepto = $datos->Concepto;
                $producto = $concepto->Descripcion;
                $importe = $concepto->Importe;
    


        }
            
        }
        
        return view("leerXml")->with('datos',$datos);
        
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
