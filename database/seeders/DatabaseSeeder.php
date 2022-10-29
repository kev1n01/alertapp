<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        \App\Models\User::factory()->create([
            'name' => 'El admin',
            'email' => 'admin@alerta.com',
        ]);

        \App\Models\User::factory(2)->create();

        $categories = [
            'asesinato',
            'robo',
            'secuestro',
            'violación',
            'extorción',
            'cobro de cupos',
        ];

        foreach($categories as $c){
            \App\Models\Category::create([
                'nombre' => $c,
            ]);
        }

        \App\Models\Post::create([
            'titulo' => 'Robo de moto de huallayco',
            'user_id' => 1,
            'category_id'=> 2,
            'ubicacion' => 'Jr. Huallayco 12342',
            'descripcion' => 'me robaron mi moto color roja',
        ]);

        \App\Models\Commentary::create([
            'mensaje' => 'gracias por la informacion estimado',
            'user_id' => 3,
            'post_id' => 1,
        ]);

        \App\Models\Commentary::create([
            'mensaje' => 'tendre precaucion, gracias uwu',
            'user_id' => 2,
            'post_id' => 1,
        ]);
    }
}
