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
        Schema::create('parcelas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime("data"); 
            $table->integer("parcela"); 
            $table->string("forma");      
            $table->float("valor"); 
            $table->boolean("paga"); 
            $table->foreignId('venda_id')->constrained();
            $table->foreignId('despesa_id')->constrained();
            $table->foreignId('produto_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parcelas', function(Blueprint $table){
            $table->foreingId('venda_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreingId('despesa_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreingId('produto_id')
            ->constrained()
            ->onDelete('cascade');
            
        });
    }
};
