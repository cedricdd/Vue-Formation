<?php

namespace Database\Factories;


use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(3, true),
            'video_url' => "video.com/" . random_int(10, 256),
            'course_id' => Course::all()->random()->id,
        ];
    }
}
