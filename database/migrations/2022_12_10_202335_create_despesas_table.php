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
        Schema::create('despesas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("descricao"); 
            $table->date("data"); 
            $table->string("image")->nullable(); 
            $table->integer("parcela")->nullable(); 
            $table->string("forma")->nullable();      
            $table->float("valor");                                                                                                                                                                 
            $table->foreignId('local_id')->constrained(); 
            $table->foreignId('catdespesa_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('despesas', function(Blueprint $table){
            $table->foreingId('catdespesa_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreingId('local_id')
            ->constrained()
            ->onDelete('cascade');
            
        });
    }
};
