<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrunDetayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urun_detay', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('urun_id')->unsigned()->unique();

            $table->boolean('slider_mi')->default(false);
            $table->boolean('gunun_firsati_mi')->default(false);
            $table->boolean('one_cikan_mi')->default(false);
            $table->boolean('cok_satan_mi')->default(false);
            $table->boolean('indirimli_mi')->default(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP'));
            //$table->softDeletes();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('urun_id')->references('id')->on('urun')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urun_detay');
    }
}
