<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Preserve every account while migrating the legacy role values.
        DB::table('users')->where('email', 'admin@solusikoneksi.co.id')->update(['role' => 'admin']);
        DB::table('users')->whereIn('role', ['petugas', ''])->orWhereNull('role')->update(['role' => 'user']);

        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user')->change();
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('petugas')->change();
        });
    }
};
