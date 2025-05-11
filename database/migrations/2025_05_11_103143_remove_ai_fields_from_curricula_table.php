<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('curricula', function (Blueprint $table) {
            $table->dropColumn(['ai_summary', 'ai_audio_url']);
        });
    }

    public function down(): void
    {
        Schema::table('curricula', function (Blueprint $table) {
            $table->text('ai_summary')->nullable();
            $table->string('ai_audio_url')->nullable();
        });
    }
};
