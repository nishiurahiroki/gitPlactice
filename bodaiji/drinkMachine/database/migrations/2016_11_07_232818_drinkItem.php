<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DrinkItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp', function (Blueprint $table) {
            $table->increments('ITEM_NO')->comment('商品No');
            $table->string('ITEM_NM', 200)->comment('商品名');
            $table->integer('UNIT_PRICE')->comment('単価');
            $table->integer('STOCK_COUNT')->comment('在庫数量');
            $table->string('IS_PR', 1)->default("0")->comment('おすすめ商品フラグ')->nullable();
            $table->string('ITEM_IMAGE_FILE_PATH', 256)->comment('商品画像パス')->nullable();
            $table->string('DELETE_FLAG', 1)->defalut("0")->comment('削除フラグ')->nullable();
            $table->integer('SORT_KEY')->comment('ソート順序')->nullable();
            $table->integer('VERSION_NO')->comment('バージョン番号')->nullable();
            $table->string('CREATE_USER_CD', 100)->comment('作成者CD')->nullable();
            $table->timestamp('CREATE_DATE')->comment('作成日時')->nullable();
            $table->string('RECORD_USER_CD', 100)->comment('更新者CD')->nullable();
            $table->timestamp('RECORD_DATE')->comment('更新日時')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('emp');
    }
}
