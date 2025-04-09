<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuari extends Model
{
    protected $table = 'usuaris';

    public function comandes()
    {
        return $this->hasMany(Comanda::class, 'usuari_id');
    }
}

