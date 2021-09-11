<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title'); 
            $table->integer('user_id'); 
            $table->text('content'); 
            $table->integer('province_id'); 
            $table->integer('district_id'); 
            $table->integer('ward_id'); 
            $table->boolean('vip')->default(false);
            $table->boolean('hidden')->default(false);
            $table->boolean('approve')->default(false);
            $table->date('valid_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
