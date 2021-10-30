<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'title'=>$this->faker->company(),
            // 'description'=>$this->faker->sentence(4),
            // 'type_id'=>rand(1,4),
            // 'start_date'=>$this->faker->dateTimeThisYear('-2 months'),
            // 'end_date'=>$this->faker->dateTimeThisYear('+2 months'),
            // 'logo'=>$this->faker->imageUrl(640, 480, 'cats'),
        ];
    }
}
