<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('description');
            $table->string('slug');
            $table->integer('stock');
            $table->integer('image');
            $table->uuid('category_id')->nullable();
            $table->uuid('owner_user_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('owner_user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('no action');

            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
