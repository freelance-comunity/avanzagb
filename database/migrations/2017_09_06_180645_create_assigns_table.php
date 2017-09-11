<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('assigns', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('reason');
            $table->date('date_assign');
            $table->date('return_date');
            $table->string('status')->default('ENTREGADO');
            $table->integer('archive_id')->unsigned();
            $table->foreign('archive_id')->references('id')->on('archives');
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
        Schema::drop('assigns');
    }

}
