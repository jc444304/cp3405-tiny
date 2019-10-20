<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->timestamps();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('type');
            $table->string('location');
            $table->string('industry')->nullable();
            $table->mediumInteger('salary')->default(0);
        });
    }

    /**
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}
