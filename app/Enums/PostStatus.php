<?php

namespace App\Enums;

enum PostStatus: string {

    use EnumToArray;
    
    case PUBLICADO = "Publicado";
    case RASCUNHO = "Rascunho";
    case PRONTO = "Pronto";
    case DESABILITADO = "Desabilitado";
}