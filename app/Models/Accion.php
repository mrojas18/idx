<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $table = 'acciones';

    protected $fillable = ['nombre', 'ticker_usd', 'ticker_ars'];


    public function inversiones(){

        return $this->hasMany(Inversion::class, 'id_accion', 'id' );
    }
}
