<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMethodologsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('methodologs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organization_id')->nullable();
            $table->string('author')->nullable();
            $table->string('name')->nullable();
            $table->string('publish')->nullable();
            $table->string('year')->nullable();
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
        Schema::dropIfExists('methodologs');
    }
}
