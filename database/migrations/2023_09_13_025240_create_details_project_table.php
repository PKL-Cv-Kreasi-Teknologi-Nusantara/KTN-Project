<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_project', function (Blueprint $table) {
            $table->bigIncrements('detail_id');
            $table->string('task', 150);
            $table->string('status', 150);
            $table->string('priority', 150);
            $table->date('deadline');
            $table->unsignedBigInteger('projects_id');

            $table->foreign('projects_id')->references('projects_id')->on('projects');
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
        Schema::dropIfExists('details_project');
    }
};
