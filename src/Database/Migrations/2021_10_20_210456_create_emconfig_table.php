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
            $table->string('description')->nullable();
            $table->string("title")->nullable();
            $table->string("type");
            $table->longText('extras')->default("");
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