<?php

namespace App\Enums;

use App\Traits\EnumToArray; ;

enum TipoCategoria : string{
    use EnumToArray;

    case Ingreso = "I";
    case Egreso = "E";

    public function label(): string{
        
        return match ($this) {
            self::Ingreso => 'Ingreso',
            self::Egreso => 'Egreso',
        };
    }
}
