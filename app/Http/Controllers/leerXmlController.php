<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        // Accedemos a los campos a necesitar
        $rfc = $xml->Rfc;
    }


}
