<?php namespace Bubblecore\Podcast\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('bubblecore_podcast_categories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('key');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bubblecore_podcast_categories');
    }

}
