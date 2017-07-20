<?php namespace Mavitm\Swiper\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMavitmSwiperItems extends Migration
{
    public function up()
    {
        Schema::create('mavitm_swiper_items', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('group_id')->nullable()->unsigned();
            $table->string('name')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('content')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mavitm_swiper_items');
    }
}
