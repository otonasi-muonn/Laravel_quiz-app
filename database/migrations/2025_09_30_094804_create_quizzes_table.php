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
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique()->comment('クイズのタイトル');
            $table->text('question')->comment('問題文');
            $table->string('option_a')->comment('選択肢A');
            $table->string('option_b')->comment('選択肢B');
            $table->string('option_c')->comment('選択肢C');
            $table->string('option_d')->comment('選択肢D');
            $table->unsignedTinyInteger('correct_option')->comment('正解の選択肢番号(1-4)');
            $table->text('explanation')->nullable()->comment('解説文');
            $table->boolean('is_published')->default(true)->comment('公開状態')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
