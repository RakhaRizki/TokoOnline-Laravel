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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('user_id');
            $table->string('name', 100);
            $table->string('email', 100);
            $table->integer('telp');
            $table->string('courier', 100)->nullable();
            $table->string('payment')->default('MIDTRANS');
            $table->string('payment_url');
            $table->integer('total_price');
            $table->string('status')->default('PENDING');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
