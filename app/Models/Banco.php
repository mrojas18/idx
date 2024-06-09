<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    use CrudTrait;
    use HasFactory;
    protected $table="bancos"; 

    protected $fillable = ['nombre']; 

    public function cuentas() {
        return $this->hasMany(Cuenta::class);
    }
}
