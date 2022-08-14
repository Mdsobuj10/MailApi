<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this -> faker -> sentence(5),
            'email' => $this -> faker -> sentence(6),
            'desc' => $this -> faker -> sentence(5),
            'img' => $this -> faker -> sentence(6),
        ];
    }
}
