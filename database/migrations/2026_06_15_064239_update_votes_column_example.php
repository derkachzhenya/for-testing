<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Risky
            $table->integer('votes')->change();

            // Safer
            $table->integer('votes')
                ->unsigned()
                ->default(1)
                ->comment('User votes')
                ->change();
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('votes')->change();
        });
    }
};




