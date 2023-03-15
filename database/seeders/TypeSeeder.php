<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = ['FrontEnd', 'BackEnd', 'FullStack'];

        foreach ($types as $type) {
            $tipo = new Type();
            $tipo->type = $type;
            $tipo->save();
        }
    }
}
