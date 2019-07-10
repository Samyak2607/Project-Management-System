<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration{
    
    public function up(){
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('project');
            $table->string('designation');
            $table->string('skill');
            $table->string('user');
            $table->timestamps();
        });
    }

    
    public function down(){
        Schema::dropIfExists('tags');
    }
}
