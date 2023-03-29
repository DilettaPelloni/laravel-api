<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Type;

//Helpers
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Blog',
            'Ecommerce',
            'Business',
            'Portfolio',
            'Event',
            'Personal',
            'Informational',
            'Forum'
        ];

        foreach ($types as $type) {
            $newType = Type::create([
                'name'=> $type,
                'slug'=> Str::slug($type)
            ]);
        }
    }
}
