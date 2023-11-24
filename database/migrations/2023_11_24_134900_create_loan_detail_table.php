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
        Schema::create('loan_detail', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_return');
            $table->timestamps();
        });
        Schema::table('loan_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('loan_id')->after('id');
            $table->foreign('loan_id')
                ->references('id')
                ->on('loans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        Schema::table('loan_detail', function (Blueprint $table) {
            $table->unsignedBigInteger('books_id')->after('loan_id');
            $table->foreign('books_id')
                ->references('id')
                ->on('books')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('loan_detail', function (Blueprint $table) {
            $table->dropForeign('loan_detail_loan_id_foreign');
            $table->dropColumn('loan_id');
        });
        Schema::table('loan_detail', function (Blueprint $table) {
            $table->dropForeign('loan_detail_books_id_foreign');
            $table->dropColumn('books_id');
        });
        Schema::dropIfExists('loan_detail');
    }
};
