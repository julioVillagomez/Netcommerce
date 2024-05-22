<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->domainName,
            'description' => fake()->text(),
            'is_completed' =>  (bool)random_int(0, 1),
            'user_id' => $this->selectUser(),
            'company_id' => Company::inRandomOrder()->first()->id


        ];
    }


    public function selectUser(){
        $user = User::inRandomOrder()
        ->withCount('tasks')
        ->having('tasks_count', '<', 5)->first();
        return $user->id;
    }
}
