<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Modify the role enum to include 'investor'
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'staf', 'investor') NOT NULL DEFAULT 'staf'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original enum values
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'staf') NOT NULL DEFAULT 'staf'");
    }
};
