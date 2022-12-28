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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("descricao"); 
            $table->dateTime("data"); 
            $table->string("image");  
            $table->integer("qtd");      
            $table->float("valor"); 
            $table->foreignId('categoria_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table){
            $table->foreingId('categoria_id')
            ->constrained()
            ->onDelete('cascade');
            
        });
    }
};
