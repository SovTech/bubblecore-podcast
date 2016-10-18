<?php namespace Bubblecore\Podcast\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateEpisodesTable extends Migration
{

    public function up()
    {
        Schema::create('bubblecore_podcast_episodes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('duration');
            $table->timestamp('pubDate');
            $table->boolean('explicit');
            $table->text('summary');
            $table->text('description');
            $table->string('subtitle');
            $table->integer('channel_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bubblecore_podcast_episodes');
    }

}
