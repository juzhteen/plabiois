<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Resident;
use App\Models\Form;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments("request_id");
            $table->foreignIdFor(Resident::class);
            $table->foreignIdFor(Form::class);
            $table->dateTime("request_date");
            $table->dateTime("expiration_date")->nullable();
            $table->boolean("accepted")->default(0);
            $table->boolean("completed")->default(0);
            $table->json("form_fields");
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
        Schema::dropIfExists('requests');
    }
}
