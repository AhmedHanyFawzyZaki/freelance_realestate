<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('name_ar')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('name_sp')->nullable();
            $table->text('description_sp')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('partners');
    }
}
