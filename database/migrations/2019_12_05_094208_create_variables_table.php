<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jame_estelake_meshki')->nullable();
            $table->string('toner_matn_meshki')->nullable();
            $table->string('sude_morede_nazar')->nullable();
            $table->string('koliye_tahrirha')->nullable();
            $table->string('koliye_gelaseha')->nullable();
            $table->string('toner_rangi_matn')->nullable();
            $table->string('toner_rangi_matn_tasvir')->nullable();
            $table->string('toner_rangi_tasvir')->nullable();
            $table->string('toner_rangi_estelak')->nullable();
            $table->string('hazine_jeld_selefon')->nullable();
            $table->string('chasbe_garm')->nullable();
            $table->string('jelde_sakht')->nullable();
            $table->string('fanar_zani')->nullable();
            $table->string('mangane_zani')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variables');
    }
}
