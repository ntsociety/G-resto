<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('menu_name')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('date_reserv')->nullable();
            $table->string('total_price')->nullable();
            $table->string('status')->default('En attente');
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
        Schema::dropIfExists('carts');
    }
};
