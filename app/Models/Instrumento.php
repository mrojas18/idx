<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable=[
        "nombre", "ticker_usd", "ticker_ars", "ratio"
    ]; 

    public function operaciones(){
        return $this->hasMany(Operacion::class); 
    }
}
