<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('archives', function(Blueprint $table) {
                $table->increments('id');
                $table->string('credit_id');
$table->string('client_id');
$table->string('group');
$table->string('product');
$table->string('client');
$table->date('start_date');
$table->string('brach');
$table->string('source_of_funding');

                $table->timestamps();
                $table->softDeletes();
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('archives');
    }

}
