<?php

namespace Database\Factories;

use App\Models\FilterOption;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FilterOptionFactory extends Factory
{
    protected $model = FilterOption::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'enable' => $this->faker->boolean(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
