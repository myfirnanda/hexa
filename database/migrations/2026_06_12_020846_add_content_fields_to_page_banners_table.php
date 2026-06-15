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
        Schema::table('page_banners', function (Blueprint $table) {
            $table->string('hero_title')->nullable()->after('title');
            $table->string('button_text')->nullable()->after('hero_title');
            $table->string('button_url')->nullable()->after('button_text');
        });
    }

    public function down(): void
    {
        Schema::table('page_banners', function (Blueprint $table) {
            $table->dropColumn(['hero_title', 'button_text', 'button_url']);
        });
    }
};
