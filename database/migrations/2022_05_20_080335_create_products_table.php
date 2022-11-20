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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('PR_NAME');
            $table->string('PR_COLOR');
            $table->string('PR_STOCK');
            $table->string('PR_PRICE');
            $table->string('PR_TYPE');
            $table->string('PR_NOTE')->nullable();
            $table->string('PR_PIC')->nullable();
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
        Schema::dropIfExists('products');
    }
};
