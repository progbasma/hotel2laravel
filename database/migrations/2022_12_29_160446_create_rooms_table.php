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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
			$table->string('title')->nullable();
			$table->string('slug')->unique();
			$table->text('thumbnail')->nullable();
			$table->text('cover_img')->nullable();
			$table->text('short_desc')->nullable();
			$table->text('description')->nullable();
			$table->integer('total_adult')->nullable();
			$table->integer('total_child')->nullable();
			$table->double('price', 12, 3)->nullable();
			$table->double('old_price', 12, 3)->nullable();
			$table->string('amenities', 150)->nullable();
			$table->string('complements', 150)->nullable();
			$table->string('beds', 100)->nullable();
			$table->integer('cat_id')->nullable();
			$table->integer('tax_id')->nullable();
			$table->integer('is_discount')->nullable();
			$table->integer('is_featured')->nullable();
			$table->integer('is_publish')->nullable();
			$table->string('lan', 100)->nullable();
			$table->text('og_title')->nullable();
			$table->text('og_image')->nullable();
			$table->text('og_description')->nullable();
			$table->text('og_keywords')->nullable();
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
        Schema::dropIfExists('rooms');
    }
};
