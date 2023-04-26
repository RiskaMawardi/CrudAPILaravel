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
        Schema::create('camat', function (Blueprint $table) {
            $table->id();
            $table->char('kdPropinsi',2);
            $table->foreign('kdPropinsi')->references('kdPropinsi')->on('propinsi')->onDelete('cascade');
            $table->char('kdWilayah',2);
            $table->foreign('kdWilayah')->references('kdWilayah')->on('wilayah')->onDelete('cascade');
            $table->char('kdCamat')->unique();
            $table->string('nmCamat',50);
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
        Schema::dropIfExists('camat');
    }
};
