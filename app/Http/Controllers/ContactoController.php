<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(): Response
    // {
    //     //
    // }

    /**
     * Show the form for creating a new resource.
     */
    // public function create(): Response
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'string'],
            'message' => ['required']
        ]);

        $contacto = Contacto::create([
            'name' => $request["name"],
            'email' => $request["email"],
            'phone' => $request["phone"],
            'message' => $request["message"]
        ]);

        // $details = [
        //     'title' => 'Area: ' . $area->nombre,
        //     'body' => 'interno: ' . $area->interno
        // ];

        // Mail::to('milanoliliana129@gmail.com')->send(new \App\Mail\sendPost($details));

        return response()->json([
            'mensaje' => 'Se Agrego correctamente el contacto',
            'data' => $contacto,
        ]);
    }



    /**
     * Display the specified resource.
     */
    // public function show(Contacto $contacto): Response
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Contacto $contacto): Response
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Contacto $contacto): RedirectResponse
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Contacto $contacto): RedirectResponse
    // {
    //     //
    // }
}