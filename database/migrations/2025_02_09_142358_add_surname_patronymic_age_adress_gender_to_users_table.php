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
      Schema::table('users', function (Blueprint $table) {
        $table->string('surname')->nullable();
        $table->string('patronymic')->nullable();
        $table->integer('age')->nullable();
        $table->string('address')->nullable();
        $table->unsignedSmallInteger('gender')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('surname');
        $table->dropColumn('patronymic');
        $table->dropColumn('age');
        $table->dropColumn('address');
        $table->dropColumn('gender');
      });
    }
};
