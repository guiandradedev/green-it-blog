<?php

namespace App\Policies;

use App\Models\CollectionPoint;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CollectionPointPolicy
{
    public function import(User $user): bool
    {
        return $user->can('import ecopoint');
    }
}
