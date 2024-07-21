<?php

namespace   App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class CotizacionesService{
    private $password; 
    private $username; 
    private $url; 
    private $expires; 
    private $mercado = "bCBA"; 

    public function __construct(){
        $this->password = config('cotizaciones.api.password'); 
        $this->username= config('cotizaciones.api.username'); 
        $this->url= config('cotizaciones.api.url'); 
        $this->expires = config("cotizaciones.api.expires"); 
    }

    private function autenticacion(){
        $response = Http::withOptions(['debug'=>false])
            ->asForm()
            ->post($this->url.'/token', 
                        [   'username'=>"rojas.manuelr@gmail.com", 
                            'password'=>"Java1234*", 
                            'grant_type'=>'password'])
            
                            ;
        $response->throw();
        $credenciales = $response->json(); 

        $credenciales['expiracion']= now()->addSeconds($response['expires_in']); 
        //dd($credenciales); 
        //elimino las credenciales actuales 
        //Cache::pull('credenciales'); 
        //actualizo con los nuevos datos de las credenciales
        Cache::put('credenciales', $credenciales, 60*15); 
        return $credenciales; 

        
        
    }

    public function refresh(){

        $credenciales = Cache::get('credenciales'); 

        $response = Http::withOptions(['debug'=>false])
        ->asForm()
        ->post($this->url.'/token', 
                    [   'refresh_token'=>$credenciales['refresh_token'], 
                        'grant_type'=>'refresh_token'])
        
                        ;
        $response->throw();
        $credenciales = $response->json(); 

        $credenciales['expiracion']= now()->addSeconds($response['expires_in']); 
        //dd($credenciales); 
        //elimino las credenciales actuales 
        //Cache::pull('credenciales'); 
        //actualizo con los nuevos datos de las credenciales
        Cache::put('credenciales', $credenciales, 60*15); 
        return $credenciales; 
    }

    public function getCredenciales(){
        $credenciales = Cache::get('credenciales', false); 
       
        
        if ($credenciales){
           Log::info("Token existe"); 
            // se se venció hago refresh 
            if(now()->gt($credenciales['expiracion'])){
                Log::info("Token Vencido"); 
               $credenciales = $this->refresh(); 
            }
        }else{
            // se no existe o se vencio todo, hasta el refresh pido una nueva credencial
            Log::info("Token no existe"); 
            $credenciales = $this->autenticacion(); 
        }
        return $credenciales; 
    }

    public function getCotizacion($accion){
        $credenciales = $this->getCredenciales(); 
        
        $apiurl ="{$this->url}/api/v2/{$this->mercado}/Titulos/{$accion}/Cotizacion"; 
        $response =  Http::withOptions(['debug'=>false])->withToken($credenciales['access_token'])
            ->get($apiurl);
            $response->throw();            
        return $response->json(); 
        
         
    }
}