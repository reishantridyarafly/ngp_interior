<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('invoice');
            $table->uuid('user_id');
            $table->string('location', 100);
            $table->date('order_date');
            $table->text('detail_survey')->nullable();
            $table->decimal('discount', 10, 2)->nullable();
            $table->decimal('total', 15, 2)->nullable();
            $table->boolean('status_survey')->default(0)->comment('0 = uncompleted, 1 = completed');
            $table->boolean('status_design')->default(0)->comment('0 = uncompleted, 1 = completed');
            $table->boolean('status_approval')->default(0)->comment('0 = uncompleted, 1 = completed');
            $table->boolean('status_production')->default(0)->comment('0 = uncompleted, 1 = completed');
            $table->boolean('status_instalation')->default(0)->comment('0 = uncompleted, 1 = completed');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
