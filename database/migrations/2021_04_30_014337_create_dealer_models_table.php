<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealerModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dealer_models', function (Blueprint $table) {
            $table->id();
            $table->String("d_name");
            $table->unsignedBigInteger("d_phone");
            $table->String("d_mail");
            $table->String("d_pass");
            $table->unique('d_mail');
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
        Schema::dropIfExists('dealer_models');
    }
}
