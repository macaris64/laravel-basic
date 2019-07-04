<?php

use Illuminate\Database\Seeder;
use App\Models\Urun;

class UrunTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Urun::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i=0;$i<150;$i++)
        {
            $name = $faker->sentence(2);
            $one_cikan_mi = rand(0,1);
            if ($one_cikan_mi == 0)
                $one_cikan_mi == false;
            else
                $one_cikan_mi == true;
            Urun::create([
                'name' => $name,
                'slug' => str_slug($name),
                'fiyat' => $faker->randomFloat(3,1,20),
                'aciklama' => $faker->sentence(6,true),
                'one_cikan_mi' => $one_cikan_mi

            ]);
        }
    }
}
