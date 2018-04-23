<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('cover_image')->nullable();
            $table->string('main_image')->nullable();
            $table->string('price')->nullable();
            $table->string('name')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('name_sp')->nullable();
            $table->text('description')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('description_sp')->nullable();
            $table->text('introduction')->nullable();
            $table->text('introduction_ar')->nullable();
            $table->text('introduction_sp')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('properties');
    }
}
