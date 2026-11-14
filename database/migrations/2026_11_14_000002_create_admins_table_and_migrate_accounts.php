<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->timestamps();
        });

        $admin = DB::table('users')->where('email', 'admin@solusikoneksi.co.id')->first();
        if ($admin) {
            DB::table('admins')->insert([
                'name' => $admin->name,
                'email' => $admin->email,
                'password' => $admin->password,
                'created_at' => $admin->created_at,
                'updated_at' => $admin->updated_at,
            ]);
            DB::table('users')->where('id', $admin->id)->delete();
        }
    }

    public function down(): void
    {
        $admin = DB::table('admins')->where('email', 'admin@solusikoneksi.co.id')->first();
        if ($admin && ! DB::table('users')->where('email', $admin->email)->exists()) {
            DB::table('users')->insert([
                'name' => $admin->name,
                'email' => $admin->email,
                'password' => $admin->password,
                'role' => 'admin',
                'created_at' => $admin->created_at,
                'updated_at' => $admin->updated_at,
            ]);
        }

        Schema::dropIfExists('admins');
    }
};
