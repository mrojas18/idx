<?php

namespace App\Models;

use App\Enums\TipoOperacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    use HasFactory;

    protected $table= "operacion"; 

    protected $fillable =[
        "instrumento_id", "cantidad", "fecha", "tipo", "cotizacion", "usd", "ars", "cuenta_id"
    ]; 

    protected $casts =[
        "tipo" => TipoOperacion::class
    ];

    public function instrumento(){
        return $this->belongsTo(Instrumento::class, "instrumento_id"); 
    }

    public function cuenta(){
        return $this->belongsTo(Cuenta::class, "cuenta_id"); 
    }

    public function getUsdActualAttribute(){
        return $this->cantidad * $this->instrumento->precio_usd; 
    }

    public function getArsActualAttribute(){
        return $this->cantidad * $this->instrumento->precio_ars ; 
    }
   


}
