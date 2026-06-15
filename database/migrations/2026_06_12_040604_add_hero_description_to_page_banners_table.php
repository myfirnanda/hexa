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
            $table->text('hero_description')->nullable()->after('hero_title');
        });
    }

    public function down(): void
    {
        Schema::table('page_banners', function (Blueprint $table) {
            $table->dropColumn('hero_description');
        });
    }
};
