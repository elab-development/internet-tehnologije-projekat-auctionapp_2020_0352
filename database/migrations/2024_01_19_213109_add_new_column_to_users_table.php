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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->after('id');
            $table->string('surname')->after('name');
            $table->string('phone_number')->after('email_verified_at');
            $table->string('balance')->after('phone_number');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('username');
            $table->dropColumn('surname');
            $table->dropColumn('phone_number');
            $table->dropColumn('balance');
        });
    }
};
