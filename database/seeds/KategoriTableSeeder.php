<?php

use Illuminate\Database\Seeder;
//use Illuminate\Support\Facades\DB;
use App\Models\Kategori;


class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Kategori::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


        for ($i=0;$i<150;$i++)
        {
            $name = $faker->firstName;
            $parent_category = rand(0,15);
            if ($parent_category == 0)
                $parent_category = null;

            Kategori::create([
                'name' => $name,
                'slug' => str_slug($name),
                'parent_category_id' => $parent_category
            ]);
        }

    }
}
