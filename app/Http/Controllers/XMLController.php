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
        $request->validate([
            'fecha'=>'required',
            'rfc'=>'requred',
            'razon_social'=>'required',
            'producto'=>'required',
            'importe'=>'required|numeric'

        ]);

        $xml = new xml;
        $xml->save();

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
