<?php

namespace App\Http\Controllers;

use App\Models\Transacciones\formatoComprobacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
/**
 * controlador que nos permite subir los archivos viculados a la cuenta del cliente en especifico
 * se checarán que el formato de los archivos subidos sean .pdf y que sólo se puedan subir tamaños
 * de 3 megabytes.
 */

class FormatoComprobacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param int $id
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  int  $id
     */
    public function store(Request $request, $id)
    {
        /**
         * invocacion de una clase
         */
        $formato = new FormatoComprobacion;
        //vamos a validar el guardado de datos de archivos
        try
        {
            if ($request->hasFile('archivocomprobacion')) {
                # validar si hay un archivo
                $archivoComprobacion = $request->file('archivocomprobacion');
                $extensionPermitida = ['pdf'];
                $extension = $archivoComprobacion->getClientOriginalExtension();
                $checkExtension = in_array($extension, $extensionPermitida);
                // si la extension no pertenece al formato pdf devoler una variable de rechazo
                if ($checkExtension) {
                    # si la extension es pdf vamos a checar el directorio para crearlo en caso de no encontrarse
                    // $path = public_path('archivos'); //ruta de subida
                    // if (!File::isDirectory($path))
                    // {
                    //     File::makeDirectory($path, 0777, true, true); # si no se encuentra se agrega la carpeta
                    // }
                    /**
                     * después de la extensión validamos si el archivo pesa lo que necesitamos
                     */
                    $fileSize = $archivoComprobacion->getClientSize(); # obtenermos el tamaño del archivo en bytes

                    if ($fileSize <= '2000000') { # validamos que sea menor o igual a 2 mb
                        # si el archivo es igual o menor a 2 mb tienes que hacer el upload
                        $fileName = 'I_Fuc_'.$id.".".$extension; // nombre con el que se guardará el archivo

                        //$finalPath = Storage::putFileAs($path, $archivoComprobacion, $fileName);
                        $archivo = Storage::putFileAs('archivos/'.$id, $archivoComprobacion, $fileName);
                        $formato->tipo_comprobacion = 'fuc';
                        $formato->url = $archivo;
                        $formato->fecha = '';
                        $formato->save();

                        return response()->json(['success' => 'La comision se actualizó con exito '.$archivo], 200);
                    } else {
                        # de lo contrario manda un mensaje de error...
                        return response()->json(['error' => 'tamaño del archivo no permitido Max: 2 MB'], 404);
                    }

                }
                else{
                    return response()->json(['error' => 'no se encuentra la extensión'], 409);
                }
            }
            else{
                return response()->json(['error' => 'no se encuentra el archivo'], 409);
            }
        }
        catch(Exception $e)
        {
            return response()->json(['Error'=> $e->getMessage()], HttpResponse::HTTP_CONFLICT);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transacciones\formatoComprobacion  $formatoComprobacion
     * @return \Illuminate\Http\Response
     */
    public function show(formatoComprobacion $formatoComprobacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transacciones\formatoComprobacion  $formatoComprobacion
     * @return \Illuminate\Http\Response
     */
    public function edit(formatoComprobacion $formatoComprobacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transacciones\formatoComprobacion  $formatoComprobacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, formatoComprobacion $formatoComprobacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transacciones\formatoComprobacion  $formatoComprobacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(formatoComprobacion $formatoComprobacion)
    {
        //
    }
}
