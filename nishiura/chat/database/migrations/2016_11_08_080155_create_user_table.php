<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user', function(Blueprint $table){
        $table->string('ID', 255);
        $table->primary('ID');
        $table->string('PASSWORD', 255);
        $table->string('NAME', 255);
        $table->text('ICON_IMAGE_FILE_PATH');
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
        Schema::drop('user');
    }
}
