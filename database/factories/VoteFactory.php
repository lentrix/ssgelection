<?php

namespace Database\Factories;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class VoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vote::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $candidates = Candidate::select('id')->get()->toArray();
        return [
            'user_id' => $this->faker->numberBetween(1,2000),
            'signature' => Str::random(10),
            'candidate_id' => $this->faker->randomElement($candidates)['id']
        ];
    }
}
