<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('created_user_id');
            $table->unsignedBigInteger('finished_user_id')->nullable();
            $table->integer('status')->default(2); //0-Finalizado|1-Cancelado|2-Pendente
            $table->text('description');
            $table->text('solution')->nullable();
            $table->decimal('price', 10,2)->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('created_user_id')->references('id')->on('users');
            $table->foreign('finished_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_services');
    }
}
