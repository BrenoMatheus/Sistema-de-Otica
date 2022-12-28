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
        Schema::create('pacients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("os");            
            $table->string("nome");
            $table->string("telefone");
            $table->string("endereco")->nullable();;
            $table->string("doencas")->nullable();;
            $table->text("observacao")->nullable();;
            $table->string("image")->nullable();;
            $table->dateTime('data');
             $table->foreignId('local_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pacients', function(Blueprint $table){
            $table->foreingId('user_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreingId('local_id')
            ->constrained()
            ->onDelete('cascade');
            
        });
    }
};
