<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => fake()->unique()->word(),
            'subject' => fake()->sentence(),
            'email_list_id' => fake()->numberBetween(1, 2),
            'template_id' => fake()->numberBetween(1, 4),
            'track_click' => fake()->boolean(),
            'track_open' => fake()->boolean(),
            // 'body' => fake()->paragraph(),
            'body' => fake()->randomHtml(),
            'send_at' => fake()->dateTimeBetween('now', '+1 week'),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => fake()->boolean ? fake()->dateTimeBetween('-7 days', 'now') : null,
                    ];
    }
}
