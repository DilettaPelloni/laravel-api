<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Project;
use App\Models\Type;

//Helpers
use Faker\Generator as Faker;

class projectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        

        for ($i=0; $i < 20; $i++) { 
            $type_id = Type::inRandomOrder()->first()->id;
            
            $project = new Project();
            $project->title = $faker->sentence(5);
            $project->description = $faker->paragraph(5);
            $project->link = $faker->url();
            $project->img = $faker->imageUrl(640, 480, 'project', true);
            $project->type_id = $type_id;
            $project->save();
        }
    }
}
