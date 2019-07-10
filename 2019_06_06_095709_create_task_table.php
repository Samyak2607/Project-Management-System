<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTable extends Migration
{
    
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('details');
            $table->string('user');
            $table->string('observer');
            $table->string('tag_id');
            $table->timestamps();


        });
    }

    
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
