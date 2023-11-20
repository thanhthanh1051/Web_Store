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
        Schema::table('comments',function(Blueprint $table) {
            $table
            ->foreign('user_id')
            ->references('id')
            ->on('users')
            ->cascadeOnDelete();

            $table
            ->foreign('product_id')
            ->references('id')
            ->on('products')
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments',function(Blueprint $table) {
            $table->dropForeign('comments_user_id_foreign');
            $table->dropForeign('comments_product_id_foreign');
        });
    }
};
