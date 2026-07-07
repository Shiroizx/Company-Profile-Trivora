<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('site_settings')->updateOrInsert(
            ['key' => 'google_verification_code'],
            ['value' => '', 'created_at' => now(), 'updated_at' => now()]
        );
        DB::table('site_settings')->updateOrInsert(
            ['key' => 'google_analytics_id'],
            ['value' => '', 'created_at' => now(), 'updated_at' => now()]
        );
    }

    public function down(): void
    {
        DB::table('site_settings')->whereIn('key', ['google_verification_code', 'google_analytics_id'])->delete();
    }
};
