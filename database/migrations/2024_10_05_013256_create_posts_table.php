<?php

use App\Enums\PostStatus;
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
            $table->string('subtitle');
            $table->text('content');
            $table->string('slug');
            $table->foreignId('author_id')->constrained(
                table: 'users', indexName:'post_author_id'
            );
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->enum('status', array_column(PostStatus::cases(),'name'))->default(PostStatus::DESABILITADO->name);
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
