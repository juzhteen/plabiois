<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->increments("resident_id");
            $table->string("name");
            $table->integer("age");
            $table->string("gender");
            $table->string("civil_status");
            $table->string("religion");
            $table->string("weight");
            $table->string("height");
            $table->string("purok");
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
        Schema::dropIfExists('residents');
    }
}
