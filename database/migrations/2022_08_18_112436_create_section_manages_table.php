<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_manages', function (Blueprint $table) {
            $table->id();
			$table->string('manage_type')->nullable();
			$table->string('section')->nullable();
			$table->string('title')->nullable();
			$table->text('url')->nullable();
			$table->text('image')->nullable();
			$table->text('desc')->nullable();
			$table->integer('is_publish')->nullable();
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
        Schema::dropIfExists('section_manages');
    }
}
