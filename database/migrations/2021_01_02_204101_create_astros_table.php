<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAstrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('astros', function (Blueprint $table) {
            $table->date('date');
            $table->string('name', 5);
            $table->unsignedTinyInteger('overall_score');
            $table->text('overall_description');
            $table->unsignedTinyInteger('romance_score');
            $table->text('romance_description');
            $table->unsignedTinyInteger('career_score');
            $table->text('career_description');
            $table->unsignedTinyInteger('wealth_score');
            $table->text('wealth_description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('astros');
    }
}
