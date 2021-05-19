<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_models', function (Blueprint $table) {
            $table->id();
            $table->string('i_name');   
            $table->string('i_desc'); 
            $table->integer('i_price');  
            $table->string('i_status');
            $table->unsignedBigInteger('d_id');
            $table->foreign('d_id')->references('id')->on('dealer_models');
            $table->mediumText('i_image')->nullable(); 
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
        Schema::dropIfExists('item_models');
    }
}
