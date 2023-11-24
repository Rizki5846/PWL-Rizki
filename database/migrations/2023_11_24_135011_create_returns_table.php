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
        Schema::create('returns', function (Blueprint $table) {
            $table->id();
            $table->boolean('charge');
            $table->integer('amount');
            $table->timestamps();
        });
        Schema::table('returns', function (Blueprint $table) {
            $table->unsignedBigInteger('loan_detail_id')->after('id');
            $table->foreign('loan_detail_id')
                ->references('id')
                ->on('loan_detail')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('returns', function (Blueprint $table) {
            $table->dropForeign('returns_loan_detail_id_foreign');
            $table->dropColumn('loan_detail_id');
        });
        Schema::dropIfExists('returns');
    }
};
