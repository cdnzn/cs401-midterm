<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Schedule>
 */
class ScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id' => Course::factory(),
            'day_of_week' => $this->faker->dayOfWeek(),
            'time_slot' => $this->faker->dateTimeBetween('now', '+1 month'),
            'room' => $this->faker->bothify('Room ###'),
            'term' => $this->faker->numberBetween(1, 3),
        ];
    }
}
