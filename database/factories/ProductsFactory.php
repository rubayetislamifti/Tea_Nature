<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Products::class;
    public function definition(): array
    {
        return [
            'name'=>$this->faker->name(),
            'description'=>$this->faker->text(),
            'price'=>$this->faker->randomFloat(2,0,1000),
            'previous_price'=>$this->faker->randomFloat(2,0,1000),
            'discount'=>$this->faker->randomFloat(2,0,1000),
            'image'=>$this->faker->imageUrl(),
            'stock'=>$this->faker->randomFloat(2,0,1000),
            'category'=>Category::inRandomOrder()->first(),
            'cartoonqty'=>$this->faker->randomFloat(2,0,1000),
            'cartoonprice'=>$this->faker->randomFloat(2,0,1000),
        ];
    }
}
