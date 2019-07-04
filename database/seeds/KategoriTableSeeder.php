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
        Kategori::truncate();

        for ($i=0;$i<100;$i++)
        {
            $name = $faker->firstName;

            Kategori::create([
                'name' => $name,
                'slug' => str_slug($name)
            ]);
        }

    }
}
