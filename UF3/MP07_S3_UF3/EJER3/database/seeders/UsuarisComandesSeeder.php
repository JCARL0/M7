<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuari;
use App\Models\Comanda;

class UsuarisComandesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuari1 = Usuari::create(['nom' => 'Jordi', 'email' => 'jordi@example.com']);
        $usuari2 = Usuari::create(['nom' => 'Maria', 'email' => 'maria@example.com']);
        $usuari3 = Usuari::create(['nom' => 'Pau', 'email' => 'pau@example.com']);

        Comanda::create(['usuari_id' => $usuari1->id, 'producte' => 'Portàtil', 'preu' => 1200.50]);
        Comanda::create(['usuari_id' => $usuari1->id, 'producte' => 'Ratolí', 'preu' => 25.99]);
        Comanda::create(['usuari_id' => $usuari1->id, 'producte' => 'Monitor', 'preu' => 300.00]);
        
        Comanda::create(['usuari_id' => $usuari2->id, 'producte' => 'Teclat', 'preu' => 59.99]);
        
        Comanda::create(['usuari_id' => $usuari3->id, 'producte' => 'Auriculars', 'preu' => 150.00]);
        Comanda::create(['usuari_id' => $usuari3->id, 'producte' => 'Impressora', 'preu' => 200.00]);
        Comanda::create(['usuari_id' => $usuari3->id, 'producte' => 'SSD', 'preu' => 120.00]);
        Comanda::create(['usuari_id' => $usuari3->id, 'producte' => 'RAM', 'preu' => 80.00]);
        Comanda::create(['usuari_id' => $usuari3->id, 'producte' => 'Placa base', 'preu' => 180.00]);
    }
}