<?php namespace Bubblecore\Podcast\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateSubcategoriesTable extends Migration
{

    public function up()
    {
        Schema::create('bubblecore_podcast_subcategories', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->unsigned()->index();
            $table->string('key');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bubblecore_podcast_subcategories');
    }

}
