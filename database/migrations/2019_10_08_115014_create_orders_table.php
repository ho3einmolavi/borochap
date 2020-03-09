<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('pay_id')->nullable();
            $table->bigInteger('file_id')->nullable();
            $table->string('customer')->nullable();
            $table->string('size')->nullable();
            $table->string('material')->nullable();
            $table->string('one_color_number')->nullable();
            $table->string('one_color_toner')->nullable();
            $table->string('colorful_number')->nullable();
            $table->string('colorful_toner')->nullable();
            $table->string('cover_type')->nullable();
            $table->string('circle_cover')->nullable();
            $table->string('thickness')->nullable();
            $table->string('cover_material')->nullable();
            $table->string('edge')->nullable();
            $table->string('Binding')->nullable();
            $table->string('circulation')->nullable();
            $table->boolean('verification')->default(0);
            $table->string('status')->nullable();
            $table->string('book_cost')->nullable();
            $table->string('final_price')->nullable();
            $table->string('paid')->nullable();
            $table->string('tarikh')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
