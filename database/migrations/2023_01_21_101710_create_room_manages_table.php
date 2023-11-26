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
        Schema::create('room_manages', function (Blueprint $table) {
            $table->id();
			$table->integer('roomtype_id')->nullable();
			$table->string('room_no')->nullable();
			$table->date('in_date')->nullable();
			$table->date('out_date')->nullable();
			$table->integer('book_status')->nullable();
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
        Schema::dropIfExists('room_manages');
    }
};
