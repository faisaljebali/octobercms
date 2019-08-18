<?php namespace Freelance\Service\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFreelanceServiceIndex extends Migration
{
    public function up()
    {
        Schema::table('freelance_service_index', function($table)
        {
            $table->string('category', 10);
            $table->text('more_info')->nullable();
            $table->integer('slide_1');
            $table->integer('slide_2');
            $table->integer('slide_3');
            $table->integer('slide_4');
            $table->string('colors');
            $table->dropColumn('category_id');
            $table->dropColumn('sub_category_id');
            $table->dropColumn('tags');
        });
    }
    
    public function down()
    {
        Schema::table('freelance_service_index', function($table)
        {
            $table->dropColumn('category');
            $table->dropColumn('more_info');
            $table->dropColumn('slide_1');
            $table->dropColumn('slide_2');
            $table->dropColumn('slide_3');
            $table->dropColumn('slide_4');
            $table->dropColumn('colors');
            $table->integer('category_id')->nullable()->unsigned();
            $table->integer('sub_category_id')->nullable()->unsigned();
            $table->string('tags', 191)->nullable();
        });
    }
}
