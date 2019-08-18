<?php namespace Freelance\Service\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFreelanceServiceIndex extends Migration
{
    public function up()
    {
        Schema::create('freelance_service_index', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('titre');
            $table->text('description');
            $table->string('slug');
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('sub_category_id')->nullable()->unsigned();
            $table->integer('prix');
            $table->string('tags')->nullable();
            $table->date('create_at');
            $table->date('update_at');
            $table->integer('user_id')->unsigned();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('freelance_service_index');
    }
}
