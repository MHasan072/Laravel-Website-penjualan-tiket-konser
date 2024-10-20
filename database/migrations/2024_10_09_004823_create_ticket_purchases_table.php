<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_purchases', function (Blueprint $table) {
            $table->bigIncrements('id_purchases');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_event');
            $table->string('purchase_code')->unique();
            $table->decimal('total_price', 10, 2);
            $table->enum('payment_status', ['pending', 'paid', 'validated'])->default('pending');
            $table->string('payment_proof')->nullable();  // Path ke file bukti pembayaran
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_event')->references('id_event')->on('events')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_purchases');
    }
}
