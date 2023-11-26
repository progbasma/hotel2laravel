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
        Schema::create('booking_manages', function (Blueprint $table) {
            $table->id();
			$table->string('booking_no', 100)->nullable();
			$table->string('transaction_no', 100)->nullable();
			$table->integer('roomtype_id')->nullable();
			$table->integer('customer_id')->nullable();
			$table->integer('payment_method_id')->nullable();
			$table->integer('payment_status_id')->nullable();
			$table->integer('booking_status_id')->nullable();
			$table->integer('total_room')->nullable();
			$table->double('total_price', 12, 3)->nullable();
			$table->double('discount', 12, 3)->nullable();
			$table->double('tax', 12, 3)->nullable();
			$table->double('subtotal', 12, 3)->nullable();
			$table->double('total_amount', 12, 3)->nullable();
			$table->double('paid_amount', 12, 3)->nullable();
			$table->double('due_amount', 12, 3)->nullable();
			$table->date('in_date')->nullable();
			$table->date('out_date')->nullable();
			$table->string('name')->nullable();
			$table->string('email')->nullable();
			$table->string('phone')->nullable();
			$table->string('country')->nullable();
			$table->string('state')->nullable();
			$table->string('zip_code')->nullable();
			$table->string('city')->nullable();
			$table->text('address')->nullable();
			$table->text('comments')->nullable();
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
        Schema::dropIfExists('booking_manages');
    }
};
