<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class leerXmlController extends Controller
{
    public function leerArchivoXml(Request $request){
        // Primero obtendremos el archivo XML
        $archivoXML = $request->file('archivo');
        
        // Pasara a leer el archivo XML
        $contenidoXML = Storage::get($archivoXML->path());

        // Convierte el contenido XML en un objeto SimpleXMLElement
        $xml = new \SimpleXMLElement($contenidoXML);

        // Accedemos a los campos a necesitar del xml para despues guardarlos en una tabla 
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

            // Guardar en la base de datos
            DB::table('concentrado')->insert([
                'fecha'=>$fechaFormateada,
                'rfc'=>$rfcEmisor,
                'razon_social'=>$nombreEmpresa,
                'producto'=>$producto,
                'importe'=>$importe
            ]);

            
        }
    }


}
