<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\User;

return new class extends Migration
{
    
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });
        
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        
        // remove before production
        $this->seed();
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
    
    /// ==== REMOVE BEFORE PRODUCTION ======
    /// Set up while making modifications to database
    
    protected $defaultDemoUser = [
        [1, 'Demo User', 'demo@example.com', NULL, '$2y$12$nYfhhsL1ZefHnXK9qpyFIOLxkp/9abBaELtZJ386XoiDrBVBUSUD2', NULL, '2025-04-25 00:21:09', '2025-04-25 00:21:09']
    ];

    public function seed() : void 
    {
        $user = collect($this->defaultDemoUser)->map(function($user){
            return array_combine(["id", "name", "email", "email_verified_at", "password", "remember_token", "created_at", "updated_at"], $user);
        });
        
        User::insert($user->toArray());
    }

    /// ==== REMOVE BEFORE PRODUCTION ======
    
};
