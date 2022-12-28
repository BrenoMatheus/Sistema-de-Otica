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
        Schema::create('exames', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("doutor"); 
            $table->string("dir_longe");            
            $table->string("dir_perto");  
            $table->string("esq_longe"); 
            $table->string("esq_perto");            
            $table->string("diagnostico");
            $table->string("indicacao");
            $table->text("observacao");
            $table->dateTime('data');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('pacient_id')->constrained();
            $table->foreignId('local_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('exames', function(Blueprint $table){
            $table->foreingId('user_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreingId('pacient_id')
            ->constrained()
            ->onDelete('cascade');
            $table->foreingId('local_id')
            ->constrained()
            ->onDelete('cascade');
            
        });

    }
};
