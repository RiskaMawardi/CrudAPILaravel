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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();
            $table->char('nik',16);
            $table->string('nama',75);
            $table->string('tmplahir',20);
            $table->date('tgllahir');
            $table->char('jeniskel',1);
            $table->char('darah',2);
            $table->text('alamat');
            $table->char('rt',3);
            $table->char('rw',3);
            $table->string('desa',75);
            $table->char('kdPropinsi',2);
            $table->foreign('kdPropinsi')->references('kdPropinsi')->on('propinsi')->onDelete('cascade');
            $table->string('propinsi',75);
            $table->char('kdCamat',2);
            $table->foreign('kdCamat')->references('kdCamat')->on('camat')->onDelete('cascade');
            $table->string('camat',75);
            $table->string('agama',15);
            $table->string('stanikah');
            $table->string('pekerjaan',35);
            $table->char('wrgnegara',3);
            $table->date('tglBerlaku');
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
        Schema::dropIfExists('penduduk');
    }
};
