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
        Schema::create('transaction_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('destination_types', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('description');
            $table->bigInteger('transaction_type_id');
            $table->bigInteger('destination_type_id')->nullable();
            $table->integer('amount')->default(0);
            $table->uuid('account_id');
            $table->uuid('destination_account_id')->nullable();
            $table->string('destination_external')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('transaction_type_id')->references('id')->on('transaction_types')->constrained();
            $table->foreign('destination_type_id')->references('id')->on('destination_types')->constrained();
            $table->foreign('account_id')->references('id')->on('accounts')->constrained();
            $table->foreign('destination_account_id')->references('id')->on('accounts')->nullable()->constrained();

            $table->index('account_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
        Schema::dropIfExists('transaction_types');
        Schema::dropIfExists('destination_types');
    }
};
