<?php

namespace App\Http\Controllers;

use App\Models\Instrumento;
use App\Models\Operacion;
use App\Services\CotizacionesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CotizacionController extends Controller
{
    private CotizacionesService $service; 

    public function __construct(CotizacionesService $cotizacionesService){
        $this->service = $cotizacionesService; 
    }

    public function getToken(Request $request){
        

        $acciones = Instrumento::whereHas('operaciones')->get(); 

        foreach($acciones as $accion){
            $response = $this->service->getCotizacion($accion->ticker_ars); 
            $accion->precio_ars = $response['ultimoPrecio']; 

            $response = $this->service->getCotizacion($accion->ticker_usd); 
            $accion->precio_usd = $response['ultimoPrecio']; 
            $accion->save(); 

            Log::info($response['ultimoPrecio']."---". $response['descripcionTitulo']); 
        }

        
        
        return $response; 
    }

    public function reporte(){
        $operacionesAgrupadas = Operacion::join('instrumentos', 'operacion.instrumento_id', '=', 'instrumentos.id') // Unir tablas
        ->select('instrumento_id')
        ->selectRaw('SUM(cantidad) as cantidad_total, SUM(cantidad * instrumentos.precio_usd) as total_usd_actual')
        ->groupBy('instrumento_id')
        ->get();

        foreach ($operacionesAgrupadas  as  $operacion) {
            echo $operacion->instrumento->nombre . " - ";
            echo $operacion->cantidad_total . " - ";
            echo number_format( $operacion->total_usd_actual, 2, ',', '.') . "\n<br>";
            
        }
    }
}
