<?php
namespace Database\Factories;

use App\Models\Tblproduk;
use Illuminate\Database\Eloquent\Factories\Factory;

class TblprodukFactory extends Factory
{
    protected $model = Tblproduk::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->numberBetween(1000, 1000000) // Price between 1000 and 1000000
        ];
    }
}