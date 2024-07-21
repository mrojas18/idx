<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Banco extends Model
{
    use HasFactory, AsSource;
    
    protected $table="bancos"; 

    protected $fillable = ['nombre']; 

    public function cuentas() {
        return $this->hasMany(Cuenta::class);
    }
}
