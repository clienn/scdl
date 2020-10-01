<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashieringTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashiering_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('patient_id');
            $table->string('number')->nullable();
            $table->string('code')->nullable();
            $table->string('exams')->nullable();
            $table->string('packages')->nullable();
            $table->string('remarks')->nullable();
            $table->decimal('discount')->nullable();
            $table->integer('discount_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('sales_invoice')->nullable();
            $table->string('total')->nullable();
            $table->string('amount_due')->nullable();
            $table->string('tendered')->nullable();
            $table->string('change_due')->nullable();
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
        Schema::dropIfExists('cashiering_transactions');
    }
}
