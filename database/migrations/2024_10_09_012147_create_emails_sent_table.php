<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailsSentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emails_sent', function (Blueprint $table) {
            $table->bigIncrements('id_email');
            $table->unsignedBigInteger('id_purchase');
            $table->enum('email_type', ['purchase_confirmation', 'payment_validation']);
            $table->text('email_content');
            $table->timestamp('sent_at')->useCurrent();
            $table->timestamps();

            $table->foreign('id_purchase')->references('id_purchases')->on('ticket_purchases')->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emails_sent');
    }
}
