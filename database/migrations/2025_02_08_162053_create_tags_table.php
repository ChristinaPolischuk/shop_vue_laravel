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
        Schema::create('tags', function (Blueprint $table) {
          $table->id(); // Автоматически создаст поле 'id'
          $table->string('title'); // Добавляем поле для названия тега
          $table->timestamps(); // Поля для времени создания и обновления
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags'); // Удаление таблицы при откате миграции
    }
};
