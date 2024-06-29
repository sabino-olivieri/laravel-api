<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker\Factory::create('it_IT');
        for ($i=0; $i < 5 ; $i++) { 
            
            $newType = new Type();
            $newType->name = ucfirst($faker->word());
            $newType->save();
        }
    }
}
