<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum Moneda : string{
    
    use EnumToArray; 

    case USD = "USD";
    case ARS = "ARS";
}
