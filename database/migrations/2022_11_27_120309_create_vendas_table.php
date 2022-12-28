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
        Schema::create('vendas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("ov")->nullable(); 
            $table->string("compra")->nullable();      
            $table->text("observacao")->nullable(); 
            $table->float("sinal");             
            $table->float("restante");           
            $table->float("total");
            $table->integer("parcela")->nullable();
            $table->string("forma")->nullable();
            $table->string("image")->nullable();
            $table->dateTime('data_entrega')->nullable();
            $table->dateTime('data')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('local_id')->constrained();
            $table->foreignId('pacient_id')->constrained();
            $table->foreignId('exame_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendas', function(Blueprint $table){
            $table->foreingId('user_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreingId('pacient_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreingId('exame_id')
            ->constrained()
            ->onDelete('cascade');
            
        });
    }
};
