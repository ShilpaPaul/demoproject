<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealeritemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealeritems', function (Blueprint $table) {
            $table->id();
            $table->string('di_name');   
            $table->string('di_desc'); 
            $table->integer('di_price');  
            $table->string('di_status');
            $table->unsignedBigInteger('d_id');
            $table->foreign('d_id')->references('id')->on('dealer_models');
            $table->mediumText('di_image')->nullable(); 
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
        Schema::dropIfExists('dealeritems');
    }
}
