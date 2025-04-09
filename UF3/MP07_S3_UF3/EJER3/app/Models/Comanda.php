<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    protected $table = 'comandes';

    public function usuari()
    {
        return $this->belongsTo(Usuari::class, 'usuari_id');
    }
}

