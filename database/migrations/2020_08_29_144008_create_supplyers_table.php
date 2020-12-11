<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplyersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplyers', function (Blueprint $table) {
            $table->bigIncrements('supplyer_id');
            $table->string('supplyer_name');
            $table->string('supplyer_phone');
            $table->string('supplyer_email');
            $table->string('supplyer_address');
            $table->string('supplyer_shope_name');
            $table->integer('supplyer_total')->default(0);
            $table->integer('supplyer_payment')->default(0);
            $table->integer('supplyer_status')->default(1);
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
        Schema::dropIfExists('supplyers');
    }
}
