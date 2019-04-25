<?php

namespace App\Http\Controllers;

use App\Models\Catalogos\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar información del proyecto
        try
        {
            $proyecto = Proyecto::with('plantillaPersonal')->get();
            $data = $proyecto->toArray();

            $response =
            [
                'success' => true,
                'data'    => $data,
                'message' => 'proyectos recuperados con éxito'
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
        // almacenar y subir información a la base de datos
        try{
            if ($request::format() == 'json') {
                # checando el formato de la respuesta
                $inputs = Input::json()->all();
                $proyecto = Proyecto::create($inputs);
                $data = $proyecto->toArray();

                //generamos una respuesta
                $response =
                [
                    'success' => true,
                    'data'    => $data,
                    'message' => 'Proyecto almacenado exitosamente'
                ];

                return response()->json($response, 200);
            }
            else
            {
                $response = [
                    'success' => false,
                    'data' => 'Error de formato.',
                    'message' => 'el formato de la peticion no corresponde al requerido'
                ];

                return response()->json($response, 404);
            }
        }
        catch(Exception $e)
        {
            return Response::json(['error' => $e->getMessage(), 'code' => 409], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catalogos\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Catalogos\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Catalogos\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Catalogos\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        //
    }
}
