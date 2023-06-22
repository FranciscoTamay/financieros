<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class leerXmlController extends Controller
{
    public function impot (){
        return view('leerXml');
    }
    public function leerArchivoXml(Request $request){
       $file=$request->file('file');
       
    }
    


}
