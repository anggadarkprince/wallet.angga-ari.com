<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
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
            $table->unsignedBigInteger('saving_id');
            $table->unsignedBigInteger('category_id');
            $table->string('transaction_title');
            $table->date('transaction_date');
            $table->text('description')->nullable();
            $table->string('location')->nullable();
            $table->string('attachment')->nullable();
            $table->decimal('amount', 20, 2, true);
            $table->timestamps();
            $table->foreign('saving_id')->references('id')->on('savings')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
}
