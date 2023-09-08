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
        $table->bigIncrements('id');
        $table->string('first_name', 100);
        $table->string('last_name', 100);
        $table->string('username', 25)->unique();
        $table->string('email')->unique();
        $table->string('number_phone', 25);
        $table->string('password');
        $table->string('address', 225)->nullable();
        $table->string('profile_photo', 50)->nullable();
        $table->string('profession', 100)->nullable();
        $table->text('summary')->nullable();
        $table->bigInteger('earning')->nullable();
        $table->string('portofolio_attachment', 50)->nullable();
        $table->enum('role', ['admin', 'freelancer', 'employer']);
        $table->timestamp('email_verified_at')->nullable();
        $table->rememberToken();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
