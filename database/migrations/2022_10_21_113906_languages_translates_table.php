<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LanguagesTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages_translates', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("word_id")->unsigned();
            $table->bigInteger("language_id")->unsigned();
            $table->text("word")->nullable();
            $table->timestamps();

            $table->foreign("word_id")
                ->references("id")
                ->on("languages_words")
                ->onDelete("cascade");

            $table->foreign("language_id")
                ->references("id")
                ->on("languages")
                ->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
