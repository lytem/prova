<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nome',191)->nullable();
            $table->string('cognome',191)->nullable();
            $table->string('partita_iva',191)->nullable();
            $table->string('codice_fiscale',191)->nullable();
            $table->string('telefono',191)->nullable();
            $table->string('email',191)->nullable();
            $table->string('residenza',191)->nullable();
            $table->string('città',191)->nullable();
            $table->integer('doctor_id');
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('patients');
    }
}
