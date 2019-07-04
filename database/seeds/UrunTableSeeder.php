<?php

use Illuminate\Database\Seeder;
use App\Models\Urun;
use App\Models\UrunDetay;


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
        UrunDetay::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i=0;$i<150;$i++)
        {
            $name = $faker->sentence(2);
            $slider_mi = rand(0,1);
            $gunun_firsati_mi = rand(0,1);
            $one_cikan_mi = rand(0,1);
            $cok_satan_mi = rand(0,1);
            $indirimli_mi = rand(0,1);

            if ($slider_mi == 0)
                $slider_mi == false;
            else
                $slider_mi == true;

            if ($gunun_firsati_mi == 0)
                $gunun_firsati_mi == false;
            else
                $gunun_firsati_mi == true;

            if ($one_cikan_mi == 0)
                $one_cikan_mi == false;
            else
                $one_cikan_mi == true;

            if ($cok_satan_mi == 0)
                $cok_satan_mi == false;
            else
                $cok_satan_mi == true;

            if ($indirimli_mi == 0)
                $indirimli_mi == false;
            else
                $indirimli_mi == true;

            $urun = Urun::create([
                'name' => $name,
                'slug' => str_slug($name),
                'fiyat' => $faker->randomFloat(3,1,20),
                'aciklama' => $faker->sentence(6,true)



            ]);
            $urunCount = Urun::count();
            $detay = $urun->detay()-> create([
                'slider_mi' => $slider_mi,
                'gunun_firsati_mi' => $gunun_firsati_mi,
                'one_cikan_mi' => $one_cikan_mi,
                'cok_satan_mi' => $cok_satan_mi,
                'indirimli_mi' => $indirimli_mi
            ]);
        }
    }
}
