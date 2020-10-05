<?php

namespace Database\Factories;

use App\Models\Agendamento;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Pessoa;
use App\Models\Coleta;

class AgendamentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Agendamento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pessoa_id'=> Pessoa::factory(),
            'coleta_id'=> Coleta::factory(),
            'data' => $this->faker->date
        ];
    }
}
