<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'source')) {
            Schema::table('users', function (Blueprint $table) {
                // Sumber pendaftaran, mis. 'reseller' dari LP /reseller. NULL = LP utama/lainnya.
                $table->string('source', 30)->nullable()->index();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('users', 'source')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropIndex(['source']);
                $table->dropColumn('source');
            });
        }
    }
};
