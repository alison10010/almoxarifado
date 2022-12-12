<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saidas', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('material_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('quant_saida');

            $table->string('possui_sei');

            $table->string('num_sei')->nullable();

            $table->string('destinatario')->nullable();

            $table->string('observacao')->nullable();

            $table->string('image')->nullable();

            $table->foreignId('user_id')
            ->constrained()
            ->onDelete('cascade')
            ->onUpdate('cascade'); 

            $table->integer('status')->nullable();

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
        Schema::dropIfExists('saidas');
    }
}
