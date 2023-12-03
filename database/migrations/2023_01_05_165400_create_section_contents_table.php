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
        Schema::create('section_contents', function (Blueprint $table) {
            $table->id();
			$table->string('section_type')->nullable();
			$table->string('page_type')->nullable();
			$table->text('url')->nullable();
			$table->text('image')->nullable();
			$table->string('title')->nullable();
			$table->text('desc')->nullable();
			$table->string('lan')->default('en');
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
        Schema::dropIfExists('section_contents');
    }
};
