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
        Schema::table('books', function (Blueprint $table) {
            $table->string('title');
            $table->text('description');
            $table->integer('publication_year');
            $table->foreignId('author_id')->constrained();
            $table->foreignId('category_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('description');
            $table->dropColumn('publication_year');
            $table->dropForeign('author_id');
            $table->dropForeign('category_id');
        });
    }
};
