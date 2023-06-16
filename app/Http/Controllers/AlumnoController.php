<?php

namespace App\Http\Controllers;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Imports\AlumnoImport; // Agrega esta línea
use App\Models\Alumno;
class AlumnoController extends Controller
{
    //
    public function importForm()
    {
        return view('import');
    }
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('file');

        Excel::import(new AlumnoImport, $file);

        return redirect()->back()->with('success', 'Datos importados correctamente');
    }
}
