<?php namespace Freelance\Service\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFreelanceServiceCategory extends Migration
{
    public function up()
    {
        Schema::create('freelance_service_category', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titre');
            $table->string('slug');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('freelance_service_category');
    }
}
