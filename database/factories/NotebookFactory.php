<?php

namespace Database\Factories;

use App\Models\Notebook;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notebook>
 */
class NotebookFactory extends Factory
{
    protected $model = Notebook::class;
    public function definition()
    {
        return [
            'fio' => $this->faker->words(3,true),
            'company' => $this->faker->word(),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'birth_date' => $this->faker->date(),
        ];
    }
}
