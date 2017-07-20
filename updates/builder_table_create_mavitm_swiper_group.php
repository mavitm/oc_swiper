<?php namespace Mavitm\Swiper\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMavitmSwiperGroup extends Migration
{
    public function up()
    {
        Schema::create('mavitm_swiper_group', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->text('options')->nullable();
            $table->text('parameters')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mavitm_swiper_group');
    }
}
