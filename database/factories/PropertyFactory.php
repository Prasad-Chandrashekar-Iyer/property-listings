<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $propertyTypes = ['Apartment', 'House', 'Commercial'];
        $statuses = ['Available', 'Sold'];
        $adj = ['Spacious', 'Modern', 'Cozy', 'Luxury', 'Charming', 'Bright'];
        $noun = ['Loft', 'Villa', 'Condo', 'Studio', 'Penthouse', 'Office Space'];
        $location_suffix = ['Downtown', 'Suburbs', 'by the Lake', 'in the Hills', 'City Center'];

        return [
            'title' => $this->faker->randomElement($adj) . ' ' . $this->faker->randomElement($noun) . ' ' . $this->faker->randomElement($location_suffix),
            'description' => $this->faker->realText(200),
            'type' => $this->faker->randomElement($propertyTypes),
            'price' => $this->faker->numberBetween(150000, 2000000),
            'location' => $this->faker->city() . ', ' . $this->faker->stateAbbr(),
            'status' => $this->faker->randomElement($statuses),
            'image' => null,
        ];
    }
}
