<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 18; $i++) {
            $project = new Project();
            $project->title = $faker->sentence(5, true);
            $project->description = $faker->paragraph();
            $project->image = $faker->imageUrl(640, 480);
            $project->url = $faker->url();
            $project->save();
        }
    }
}
