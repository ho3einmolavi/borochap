<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calculations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('size_id')->nullable();
            $table->bigInteger('material_id')->nullable();
            $table->string('one_color_paper_cost')->nullable();
            $table->string('one_color_toner')->nullable();
            $table->string('one_color_profit')->nullable();
            $table->string('colorful_paper_cost')->nullable();
            $table->string('colorful_toner')->nullable();
            $table->string('colorful_profit')->nullable();
            $table->string('cover_cost')->nullable();
            $table->string('binding_cost')->nullable();
            $table->string('book_cost')->nullable();
            $table->string('final_price')->nullable();
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
        Schema::dropIfExists('calculations');
    }
}
