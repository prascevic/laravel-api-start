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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('role_id')->nullable()->default(1);
            // $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('user_roles', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('role');
        });

        DB::table('user_roles')->insert([
            ['role' => 'developer'],
            ['role' => 'admin'],
        ]);

        DB::table('users')->insert([
            ['name' => 'admin', 'email'=> 'admin@mail.com', 'password'=> 'admin', 'role_id'=> 0] ,
            ['name' => 'dev', 'email'=> 'dev@mail.com', 'password'=> 'dev','role_id'=> 1] ,
        ]);

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        // Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
