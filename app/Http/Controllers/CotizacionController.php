<?php

namespace App\Http\Controllers;

use App\Models\Instrumento;
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
        

        $acciones = Instrumento::all(); 

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
}
