<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    // /**
    //  * 
    //  * @var array
    //  */
    // protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'dob' => fake()->date(),
            'marital_status' => fake()->randomElement(['Married', 'Single', 'Divorced']),
            'approval_status' => fake()->randomElement(['Pending', 'Processing', 'Approved']),
            'created_by' => User::all()->random()->id,
            'updated_by' => User::all()->random()->id,
            'created_on'=> fake()->dateTime(),
            'updated_on' => fake()->dateTime(),
        ];
    }
}
