<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid(),
            'user_id' => '7194f9bb-9b96-4e37-ad64-3e594340b0d2',
            'title' => $this->faker->text,
            'description' => $this->faker->realText,
            'plan_start' => Carbon::now()->addDay(),
            'plan_finish' => Carbon::now()->addDay(),
            'date'=>Carbon::now()->addDay()

        ];
    }
}
