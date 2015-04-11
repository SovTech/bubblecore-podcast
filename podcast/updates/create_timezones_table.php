<?php namespace Bubblecore\Podcast\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTimezonesTable extends Migration
{

    public function up()
    {
        Schema::create('bubblecore_podcast_timezones', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bubblecore_podcast_timezones');
    }

}
