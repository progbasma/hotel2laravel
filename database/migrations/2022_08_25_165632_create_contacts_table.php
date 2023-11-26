<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
			$table->string('title')->nullable();
			$table->longText('contact_info')->nullable();
			$table->longText('contact_form')->nullable();
			$table->longText('contact_map')->nullable();
			$table->integer('is_recaptcha')->nullable();
			$table->string('mail_subject', 100)->nullable();
			$table->integer('is_copy')->nullable();
			$table->integer('is_publish')->nullable();
			$table->string('lan', 100)->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
