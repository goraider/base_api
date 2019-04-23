<?php

namespace App\Http\Controllers;

use App\Models\Catalogos\LugarComision;
use Illuminate\Http\Request;

class LugarComisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //enviamos y mostramos las respuestas de las peticiones get
        try
        {
            $lugar = LugarComision::with('comision')->get();
            $data = $lugar->toArray();

            //generamos la respuesta
            $response =
            [
                'success'   => true,
                'data'      => $data,
                'message'   => 'Lugar de comision recuperados con éxito'
            ];

            return response()->json($response, 200);
        }
        catch(Exception $e)
        {
            return Response::json(['error' => $e->getMessage(), 'code' => 409], 409);
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogos\LugarComision  $lugarComision
     * @return \Illuminate\Http\Response
     */
    public function show(LugarComision $lugarComision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalogos\LugarComision  $lugarComision
     * @return \Illuminate\Http\Response
     */
    public function edit(LugarComision $lugarComision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogos\LugarComision  $lugarComision
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LugarComision $lugarComision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogos\LugarComision  $lugarComision
     * @return \Illuminate\Http\Response
     */
    public function destroy(LugarComision $lugarComision)
    {
        //
    }
}
