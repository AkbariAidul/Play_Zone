<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // dalam fungsi up()
public function up(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('role')->default('user')->after('email'); // 'admin' atau 'user'
    });
}

// dalam fungsi down()
public function down(): void
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('role');
    });
}
};
