<?php

namespace Database\Factories;

use App\Models\Entity;
use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Varchar>
 */
class VarcharFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'value' => 'value__' . rand(1, 123)
        ];
    }
}