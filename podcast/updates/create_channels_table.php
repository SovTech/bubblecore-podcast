<?php namespace Bubblecore\Podcast\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateChannelsTable extends Migration
{

    public function up()
    {
        Schema::create('bubblecore_podcast_channels', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('author');
            $table->string('managingEditor');
            $table->string('webMaster');
            $table->string('ownerName');
            $table->string('ownerEmail');
            $table->string('coverTitle');
            $table->string('coverLink');
            $table->string('keywords');
            $table->text('summary');
            $table->text('description');
            $table->integer('category_id')->unsigned()->default(0);
            $table->integer('subcategory_id')->default(0);
            $table->boolean('explicit');
            $table->string('feedlink');
            $table->string('link');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bubblecore_podcast_channels');
    }

}
