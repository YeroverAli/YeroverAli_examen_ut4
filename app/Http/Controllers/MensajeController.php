<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Message;

class MensajeController extends Controller
{
    // Muestra el formulario
    public function create()
    {
        $bienvenida = "Bienvenido al formulario de mensajes";

        // Retornamos la vista del formulario
        return view('mensaje.create', compact('bienvenida'));
    }

    public function store(Request $request)
    {
        // Validamos los datos recibidos
        $datos = $request->validate([
            'nombre' => 'required|string|max:50',
            'email' => 'required|email',
            'mensaje' => 'required|string|max:500',
        ]);

        // Crear una nueva instancia del modelo Message
        $mensaje = new Message();   
        $mensaje->name = $datos['nombre'];
        $mensaje->email = $datos['email'];
        $mensaje->message = $datos['mensaje'];
        
        // Guardar el mensaje en la base de datos
        $mensaje->save();                     

        // Redirigimos de vuelta al formulario con un mensaje de éxito. Es un helper de Laravel que crea una respuesta de redirección. Es un helper de Laravel que crea una respuesta de redirección.
        // with('status', '...') añade un dato temporal a la sesión que estará disponible solo en la siguiente solicitud. Este dato se conoce como mensaje flash.
        return redirect()->route('mensaje.create')->with('status', 'Mensaje guardado correctamente.');
    }

    public function index()
    {
        $mensajes = Message::all();

        // Pasamos los mensajes a la vista
        // compact('mensajes') crea un array con la variable $mensajes
        return view('mensaje.index', compact('mensajes'));
    }

}
