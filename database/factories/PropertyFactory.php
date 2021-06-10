<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            $title = $this->faker->sentence();
            $slug = Str::slug($title);

        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,            
            'title' => $title,
            'slug' => $slug,
            'street' => $this->faker->streetName(),
            'number' => $this->faker->buildingNumber(),
            'zip_code' => $this->faker->postcode(),
            'city' => $this->faker->city(),
            'asking_price' => $this->faker->numberBetween(100000, 2000000),
            'desciption' => $this->faker->paragraph(),
            'location_id' => \App\Models\Location::inRandomOrder()->first()->id,
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'property_type' => 'Appartment',
            'built_in' => $this->faker->numberBetween(1970, 2020),
            'area_size_indoor' => $this->faker->numberBetween(100, 400),
            'area_size_outdoor' => $this->faker->numberBetween(300, 2000),
            'bedrooms' => $this->faker->numberBetween(2,6),
            'bathrooms' => $this->faker->numberBetween(2,4),
        ];
    }
}
