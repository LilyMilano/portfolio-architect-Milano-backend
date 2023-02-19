<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'integer'],
            'message' => ['required', 'min:4'],
        ]);

        $contacto = Contacto::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'message' => $request['message'],
        ]);

        $details = [
            'title' => 'Contacto: ' . $contacto->name,
            'body' => 'Datos: ' . $contacto->email . ', ' . $contacto->phone . ', ' . $contacto->message,
        ];

        Mail::to('pin2203.g4@gmail.com')->send(new \App\Mail\sendPost($details));

        return response()->json([
            'mensaje' => 'Se Agrego correctamente el contacto',
            'data' => $contacto,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Contacto $contacto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}