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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            // $table->string('author');                                                  ~> jika tidak menggunakan relasi
            $table->unsignedBigInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            // $table->foreignId('category_id')->constrained('categories', 'posts_category_id');            //    ~> versi singkat dari diatas (+ index otomatis)
            $table->foreignId('category_id')->constrained();
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
