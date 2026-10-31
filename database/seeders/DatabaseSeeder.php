<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autor;
use App\Models\Libro;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $autor1 = Autor::create(['nombre' => 'Gabriel García Márquez', 'nacionalidad' => 'peruana']);
        $autor2 = Autor::create(['nombre' => 'Mario Vargas Llosa', 'nacionalidad' => 'Peruana']);
        $autor3 = Autor::create(['nombre' => 'Isabel Allende', 'nacionalidad' => 'peruana']);

        Libro::create(['autor_id' => $autor1->id, 'titulo' => 'Cien años de soledad', 'isbn' => '9780307474728', 'precio' => 45.00]);
        Libro::create(['autor_id' => $autor1->id, 'titulo' => 'Asfixia', 'isbn' => '9780307387264', 'precio' => 40.00]);
        Libro::create(['autor_id' => $autor1->id, 'titulo' => 'La ciudad de la furia', 'isbn' => '9781400034956', 'precio' => 35.00]);

        Libro::create(['autor_id' => $autor2->id, 'titulo' => 'La ciudad y los perros', 'isbn' => '9788420471839', 'precio' => 50.00]);
        Libro::create(['autor_id' => $autor2->id, 'titulo' => 'La fiesta del Chivo', 'isbn' => '9788466332163', 'precio' => 48.00]);
        Libro::create(['autor_id' => $autor2->id, 'titulo' => 'Conversación en La Catedral', 'isbn' => '9788420471846', 'precio' => 52.00]);
        Libro::create(['autor_id' => $autor2->id, 'titulo' => 'Los cachorros', 'isbn' => '9788420471853', 'precio' => 30.00]);

        Libro::create(['autor_id' => $autor3->id, 'titulo' => 'La casa de los espíritus', 'isbn' => '9780307474735', 'precio' => 42.00]);
        Libro::create(['autor_id' => $autor3->id, 'titulo' => 'Largo pétalo de mar', 'isbn' => '9781984899170', 'precio' => 46.00]);
        Libro::create(['autor_id' => $autor3->id, 'titulo' => 'Paula', 'isbn' => '9780060927210', 'precio' => 38.00]);
    }
}