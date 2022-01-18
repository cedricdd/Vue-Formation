<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Episode;
use App\Models\User;
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
        if($this->command->confirm('Do you want to refresh the database?', true)) {
            $this->command->call('migrate:refresh');
            $this->command->info('Database was refreshed');
        }

        User::factory()->default()->create();
         User::factory(10)->create();

         Course::factory(15)->create()->each(function ($course) {
             Episode::factory()->count(random_int(10, 25))->for(
                 $course, 'course'
             )->create();
         });
        //Episode::factory(150)->create();
    }
}
