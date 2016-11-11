<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTreadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tread', function(Blueprint $table){
          $table->bigIncrements('REMARK_ID');
          $table->timestamp('REMARK_TIMESTAMP');
          $table->string('REMARK_USER_ID', 255);
          $table->text('REMARK');
          $table->text('REMARK_FILE_PATH');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('tread');
    }
}
