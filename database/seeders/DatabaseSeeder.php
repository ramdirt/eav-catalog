<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Product;
use App\Models\Varchar;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    public $type_id;
    public $faker;
    public $count;

    public function __construct()
    {
        $this->type_id = 1;
        $this->faker = Factory::create();
        $this->count = 50000;
    }

    public function run()
    {
        DB::table('entities')->insert([
            'type_id' => $this->type_id,
            'name' => 'product',
        ]);


        $attributes = collect(['categories', 'cities']);
        $attributes->each(function ($attribute) {
            DB::table('attributes')->insert([
                'name' => $attribute,
                'type_id' => $this->type_id
            ]);
        });


        $products = Product::factory($this->count)->make(['type_id' => $this->type_id]);
        $this->save(Product::class, $products, 5000);


        $cities = $this->cities();
        $make_cities = Varchar::factory($this->count)->state(new Sequence(
            fn ($sequence) => [
                'entity_id' => rand(1, $this->count),
                'type_id' => $this->type_id,
                'attribute_id' => 1,
                'value' => $cities[rand(1, 30)]
            ]
        ))->make();
        $this->save(Varchar::class, $make_cities, 5000);


        $categories = $this->categories();
        $make_categories = Varchar::factory($this->count)->state(new Sequence(
            fn ($sequence) => [
                'entity_id' => rand(1, $this->count),
                'type_id' => $this->type_id,
                'attribute_id' => 2,
                'value' => $categories[rand(1, 100)]
            ]
        ))->make();
        $this->save(Varchar::class, $make_categories, 5000);
    }

    private function save($model, $array, $count)
    {
        $chunks = $array->chunk($count);
        $chunks->each(function ($chunk) use ($model) {
            $model::insert($chunk->toArray());
        });
    }

    private function cities(): array
    {
        $cities = [];
        for ($i = 0; $i < 31; $i++) {
            $cities[] = $this->faker->city();
        };
        return $cities;
    }

    private function categories(): array
    {
        $categories = [];
        for ($i = 0; $i < 101; $i++) {
            $categories[] = $this->faker->name();
        };
        return $categories;
    }
}