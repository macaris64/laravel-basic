<?php

use Illuminate\Database\Seeder;
use App\Models\SepetMode;

class SepetModeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        SepetMode::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        SepetMode::create([
            'mode' => 'with_session',
            'is_active' => true
        ]);
        SepetMode::create([
            'mode' => 'with_db',
            'is_active' => false
        ]);
    }
}
