<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectTable extends Migration
{

    public function up()
    {
        Schema::create('project', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('company_name');
            $table->string('details');
            $table->string('imp_key_points');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('project');
    }
}

