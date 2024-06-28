<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker\Factory::create('it_IT');

        for ($i=0; $i < 10 ; $i++) {             
            $newProject = new Project();
            $newProject->title = $faker->sentence();
            $newProject->description = $faker->text();
            $newProject->image = $faker->imageUrl();
            $newProject->site_url = $faker->url();
            $newProject->start_date = $faker->dateTimeBetween('-2 week', '-1 week');
            $newProject->finish_date = $faker->dateTimeBetween('-1 week', 'now');
            $newProject->slug = Str::slug($newProject->title);
            $newProject->save();
        }
    }
}
