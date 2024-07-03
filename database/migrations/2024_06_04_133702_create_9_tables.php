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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });
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
    return;
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo_url')->nullable();
            $table->timestamps();
        });
        Schema::create('author_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('author_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('role');
            $table->string('email');
            $table->string('gender');
            $table->timestamps();
        });
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->text('content');
            $table->integer('rating');
            $table->timestamp('feedback_date');
            $table->timestamps();
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamp('order_date');
            $table->foreignId('user_id')->constrained('accounts')->onDelete('cascade');
            $table->string('address');
            $table->decimal('total_amount', 10, 2);
            $table->boolean('is_paid');
            $table->string('receiver_name');
            $table->string('phone_number');
            $table->timestamps();
        });
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();
        });
        Schema::create('cart_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('accounts')->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->integer('quantity');
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
