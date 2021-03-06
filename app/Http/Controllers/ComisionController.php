<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transacciones\Comision;
use App\Models\Transacciones\LugarComision;
// use App\Models\Transacciones\MotivoComision;
use Illuminate\Database\Eloquent\Collection;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ComisionController extends Controller
{
    /**
     * Display a listing of the resource.Transacciones
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
                    //$motivos_comision = MotivoComision::with('motivosComisiones')->get();
                    try
                    {
                        $comisiones = Comision::with('lugaresComision')->get();
                        $lugares = LugarComision::with('comisionLugares')->get();
                        $data = $comisiones->toArray();

                        return response()->json($data, 200);
                    }
                    catch(Exception $e)
                    {
                        return Response::json(['error' => $e->getMessage(), 'code' => 409], 409);
                    }




                    // $com = DB::table('lugares_comisiones')
                    // ->where("id_comision",">","0")
                    // ->join('comisiones', 'comisiones.id', '=', 'lugares_comisiones.id_comision')
                    // ->get();

                    //return $comisiones;
                    // return $com;


        // $comisiones = Comision::all();

        // foreach ($comisiones as $comision) {
        //     return $comisiones;
        // }




    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $datos = Input::json()->all();

        $datos = (object) $datos;

        $comision = new Comision;

        $comision->motivo_comision = $datos->motivo_comision;
        $comision->no_comision  = $datos->no_comision;
        $comision->no_memorandum  = $datos->no_memorandum;
        
        $comision->nombre_comisionado = $datos->nombre_comisionado;
        $comision->rfc          = $datos->rfc;
        $comision->categoria    = $datos->categoria;
        $comision->telefono     = $datos->telefono;

        $comision->user_id  = $datos->user_id;
        $comision->es_vehiculo_oficial  = $datos->es_vehiculo_oficial;
        $comision->fecha  = $datos->fecha;
        $comision->total  = $datos->total;
        $comision->tipo_comision  = $datos->tipo_comision;
        $comision->placas  = $datos->placas;
        $comision->modelo  = $datos->modelo;
        $comision->status_comision  = $datos->status_comision;
        $comision->total_peaje  = $datos->total_peaje;
        $comision->total_combustible  = $datos->total_combustible;
        $comision->total_fletes_mudanza  = $datos->total_fletes_mudanza;
        $comision->total_pasajes_nacionales  = $datos->total_pasajes_nacionales;
        $comision->total_viaticos_nacionales  = $datos->total_viaticos_nacionales;
        $comision->total_viaticos_extranjeros  = $datos->total_viaticos_extranjeros;
        $comision->total_pasajes_internacionales  = $datos->total_pasajes_internacionales;
        $comision->nombre_subdepartamento  = $datos->nombre_subdepartamento;
        $comision->organo_responsable_id  = $datos->organo_responsable_id;
        $comision->plantilla_personal_id  = $datos->plantilla_personal_id;


        if($comision->save()){
            if(property_exists($datos, "lugares_comision")){
                $lugares = array_filter($datos->lugares_comision, function($v){return $v !== null;});
                foreach ($lugares as $key => $value) {
                    //validar que el valor no sea null
                    if($value != null){
                        //comprobar si el value es un array, si es convertirlo a object mas facil para manejar.
                        if(is_array($value))
                            $value = (object) $value;

                            $lugar = new LugarComision;
                            $lugar->comision_id           = $comision->id;
                            $lugar->sede                  = $value->sede;
                            $lugar->fecha_inicio          = $value->fecha_inicio;
                            $lugar->fecha_termino         = $value->fecha_termino;
                            $lugar->cuota_diaria          = $value->cuota_diaria;
                            $lugar->total_dias            = $value->total_dias;
                            $lugar->es_nacional           = $value->es_nacional;
                            $lugar->periodo               = $value->periodo;
                            $lugar->termino               = $value->termino;
                            $lugar->save();
                    }
                }
            }

            return response()->json(['success' => 'La comision se ha agregado con exito', $datos], 200);

        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Comision::find($id);


        if(!$data){
            return response()->json(['error' => 'No se encuentra la comision que esta buscando'], 404);
        }

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // actualizamos la comisión
        $input = Input::json()->all();
        if (is_array($input))
            $input = (object) $input;

        try
        {
             // instanciamos la clase comision
            $comision = new Comision;
            // obtenermos el valor del dato seleccionado
            $data = $comision::find($id);
            // parejamos los valores con el request
            $data->motivo_comision     = $input->motivo_comision;
            $data->no_comision         = $input->no_comision;
            $data->no_memorandum       = $input->no_memorandum;
            $data->usuario_id          = $input->usuario_id;
            $data->es_vehiculo_oficial = $input->es_vehiculo_oficial;
            $data->fecha               = $input->fecha;
            $data->total               = $input->total;
            $data->tipo_comision       = $input->tipo_comision;
            $data->placas              = $input->placas;
            $data->modelo              = $input->modelo;
            $data->status_comision     = $input->status_comision;
            $data->total_peaje         = $input->total_peaje;
            $data->total_combustible   = $input->total_combustible;
            $data->total_fletes_mudanza = $input->total_fletes_mudanza;
            $data->total_pasajes_nacionales = $input->total_pasajes_nacionales;
            $data->total_viaticos_nacionales = $input->total_viaticos_nacionales;
            $data->total_viaticos_extranjeros = $input->total_viaticos_extranjeros;
            $data->total_pasajes_internacionales = $input->total_pasajes_internacionales;
            $data->nombre_subdepartamento = $input->nombre_subdepartamento;
            $data->organo_responsable_id  = $input->organo_responsable_id;
            $data->plantilla_personal_id  = $input->plantilla_personal_id;

            // validamos si se guardan los datos
            if ($data->save()) {
                # guardar
                if (property_exists($input, "lugares_comision")) {
                    # code...
                    $lugares = array_filter($input->lugares_comision, function($v){return $v !== null;});
                    foreach ($lugares as $key => $value) {
                        # hacemos un bucle para obtener los valores de la siguiente consulta
                        if ($value != null) {
                            # comprobar si el value es un array, si es convertirlo a object mas facil para manejar.
                            if (is_array($value))
                                $value = (object) $value;

                            $lugarComision = new LugarComision;
                            # obtener el valor que ya se asocio con la comision
                            $lugar = $lugarComision::where('comision_id', $data->id)->get();

                            $lugar->comision_id     = $value->comision_id;
                            $lugar->sede            = $value->sede;
                            $lugar->fecha_inicio    = $value->fecha_inicio;
                            $lugar->fecha_termino   = $value->fecha_termino;
                            $lugar->cuota_diaria    = $value->cuota_diaria;
                            $lugar->total_dias      = $value->total_dias;
                            $lugar->es_nacional     = $value->es_nacional;
                            $lugar->periodo         = $value->periodo;
                            $lugar->termino         = $value->termino;
                            // se actualizan los registros
                            $lugar->save();
                        }
                    }
                }

                return response()->json(['success' => 'La comision se actualizó con exito'], 200);
            }
        }
        catch (Exceptions $e){
            return Response::json(['error' => $e->getMessage(), 'code' => 409], 409);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
