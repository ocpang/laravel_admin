<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order')->nullable()->default(0);
            $table->string('name', 50)->nullable()->default(NULL);
            $table->string('link', 50)->nullable()->default(NULL);
            $table->string('icon', 50)->nullable()->default(NULL);
            $table->integer('parent_id')->nullable()->default(0);
            $table->string('language', 50)->nullable()->default(NULL);
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
        Schema::dropIfExists('menus');
    }
}
