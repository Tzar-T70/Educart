<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('payment_id');
            $table->unsignedBigInteger('order_id');
            $table->decimal('total_amount', 10, 2);
            $table->string('payment_method', 50)->nullable();
            $table->date('payment_date')->nullable();
            $table->string('payment_status', 20)->default('pending');
            $table->timestamps();

            $table->foreign('order_id')
                  ->references('order_id')->on('orders')
                  ->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('payments');
    }
};
