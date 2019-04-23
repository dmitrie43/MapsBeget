<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $this->getArea('Базарносызганский ');
        $this->getArea('Барышский ');
        $this->getArea('Вешкаймский ');
        $this->getArea('Инзенский ');
        $this->getArea('Карсунский ');
        $this->getArea('Кузоватовский ');
        $this->getArea('Майнский ');
        $this->getArea('Мелекесский ');
        $this->getArea('Николаевский ');
        $this->getArea('Новомалыклинский ');
        $this->getArea('Новоспасский ');
        $this->getArea('Павловский ');
        $this->getArea('Радищевский ');
        $this->getArea('Сенгилеевский ');
        $this->getArea('Старокулаткинский ');
        $this->getArea('Старомайнский ');
        $this->getArea('Сурский ');
        $this->getArea('Тереньгульский ');
        $this->getArea('Ульяновский ');
        $this->getArea('Цильнинский ');
        $this->getArea('Чердаклинский ');
    }

    protected function getArea($name) {
        DB::table('areas')->insert(array('name' => $name.'район'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('areas');
    }
}
