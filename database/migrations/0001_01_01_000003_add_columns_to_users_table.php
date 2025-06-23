<?php

declare(strict_types=1);

use App\Enums\UserRole;
use App\Models\User;
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
            $table->string('role')
                ->nullable()
                ->after('email_verified_at');

            // Add ULID for welcome link
            $table->ulid()
                ->nullable()
                ->unique()
                ->after('id');

            $table->timestamp('password_set_at')->nullable();
        });

        User::each(function (User $user) {
            $user->update([
                'role' => UserRole::ADMIN,
            ]);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->change();
            $table->ulid()->change();
        });
    }
};
