<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmconfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emconfig', function (Blueprint $table) {
            $table->id();
            $table->string('scope')->index();
            $table->string('key')->index();
            $table->text('value')->nullable();
            $table->string("type")->nullable();
            $table->text('extras');
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
        Schema::dropIfExists('emconfig');
    }
}
