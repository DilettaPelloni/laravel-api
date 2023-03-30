<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Model
use App\Models\Project;

//Helpers
use Illuminate\Support\Str;

class Project_slug_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::all();
        foreach ($projects as $project) {
            $title = $project->title;
            $project->slug = Str::slug($title);
            $project->save();
        }
    }
}
