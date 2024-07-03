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

        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->decimal('price', 10, 2);
            $table->integer('quantity');
            $table->string('photo_url');
            $table->text('description');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->json('author_ids');
            $table->string('isbn')->nullable(); // ISBN for books
            $table->string('file_format')->nullable(); // File format for electronic books
            $table->integer('duration')->nullable(); // Duration for audio books in minutes
            $table->string('type')->check(function ($type) {return in_array($type, ['electronic', 'audio', 'book']);
    });
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('9_tables');
    }
};
