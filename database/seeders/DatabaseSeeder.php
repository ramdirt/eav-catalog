<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(100)->create();


        DB::table('entity_types')->insert([
            'name' => 'user',
        ]);
        DB::table('entity_types')->insert([
            'name' => 'product',
        ]);


        DB::table('attributes')->insert([
            'name' => 'categories',
            'entity_type_id' => 2
        ]);
        DB::table('attributes')->insert([
            'name' => 'cities',
            'entity_type_id' => 2
        ]);


        DB::table('varchar_values')->insert([
            'entity_id' => 1,
            'entity_type_id' => 2,
            'attribute_id' => 1,
            'value' => 'Телефоны'
        ]);
        DB::table('varchar_values')->insert([
            'entity_id' => 1,
            'entity_type_id' => 2,
            'attribute_id' => 1,
            'value' => 'Машины'
        ]);

        DB::table('varchar_values')->insert([
            'entity_id' => 1,
            'entity_type_id' => 2,
            'attribute_id' => 2,
            'value' => 'Ковров'
        ]);
        DB::table('varchar_values')->insert([
            'entity_id' => 1,
            'entity_type_id' => 2,
            'attribute_id' => 2,
            'value' => 'Владимир'
        ]);
    }
}