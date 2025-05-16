<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController
{
    public function store(Request $request){

        request()->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'mensaje' => 'required',
        ]);

        Mail::to('samuel.mem123@gmail.com')->send(new \App\Mail\ContactanosMailable($request->all()));

        return response()->json(['success' => true, 'mensaje' => '✅ ¡Mensaje enviado correctamente!']);
    }
}
