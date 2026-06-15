<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->after('id');
        });
        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->after('id');
        });
        Schema::table('testimonials', function (Blueprint $table) {
            $table->unsignedInteger('sort_order')->default(0)->after('id');
        });

        foreach (['projects', 'clients', 'testimonials'] as $tbl) {
            $ids = DB::table($tbl)->orderBy('id')->pluck('id');
            foreach ($ids as $i => $id) {
                DB::table($tbl)->where('id', $id)->update(['sort_order' => $i]);
            }
        }
    }

    public function down(): void
    {
        Schema::table('projects',     fn($t) => $t->dropColumn('sort_order'));
        Schema::table('clients',      fn($t) => $t->dropColumn('sort_order'));
        Schema::table('testimonials', fn($t) => $t->dropColumn('sort_order'));
    }
};
