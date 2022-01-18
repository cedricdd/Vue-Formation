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
            'description' => $this->faker->paragraphs(3, true),
            'video_url' => "https://www.youtube.com/watch?v=XqZsoesa55w",
            'course_id' => Course::all()->random()->id,
        ];
    }
}
