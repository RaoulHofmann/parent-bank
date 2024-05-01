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
        Schema::create('accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->bigInteger('account_type_id');
            $table->integer('account_id')->nullable();
            $table->integer('amount')->default(0);
            $table->decimal('custom_interest')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('account_type_id')->references('id')->on('account_types')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
