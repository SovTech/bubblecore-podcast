<?php namespace Bubblecore\Podcast\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateSettingsTable extends Migration
{

    public function up()
    {
        Schema::create('bubblecore_podcast_settings', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bubblecore_podcast_settings');
    }

}
