<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_invoice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_code')->default(0);
            $table->integer('customer_id')->default(0)->index();
            $table->integer('total_money')->default(0);
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('note')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('type')->default(1)->comment('1 la tien mat, 0 la chuyen khoan');
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
        Schema::dropIfExists('customer_invoice');
    }
}
