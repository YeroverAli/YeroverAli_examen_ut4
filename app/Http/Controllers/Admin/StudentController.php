<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validamos los datos recibidos
        $datos = $request->validate([
            'name' => 'required|string',
            'subject' => 'required|string',
            'note' => 'required|integer',
        ]);

        //Creamos un objeto estudiante que tendrá los valores recibidos del formulario, y estos se guardará en la base de datos
        $student = new Student();
        $student->name = $datos['name'];
        $student->subject = $datos['subject'];
        $student->note = $datos['note'];
        $student->save();

        return redirect()->route('admin.students.create')->with('success', 'Calificación guardada.');
    }
}