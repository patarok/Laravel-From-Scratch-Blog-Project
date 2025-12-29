<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                    // Generates a 640x480 image URL
                    'path' => $this->faker->imageUrl(640, 480, 'nature'), 
                    'alt_text' => $this->faker->sentence(),
                    // This picks a random existing Post ID
                    'post_id' => Post::inRandomOrder()->first()->id ?? Post::factory(),
                ];
    }
}
