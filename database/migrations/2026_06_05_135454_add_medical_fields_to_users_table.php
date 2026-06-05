<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Modificamos email para que sea nullable (Google Users podrían no compartirlo a veces, aunque es raro)
            $table->string('email')->nullable()->change();
            
            // Nuevos campos médicos/legales
            $table->string('document_type', 20)->nullable()->after('email');
            $table->string('document_number', 50)->nullable()->unique()->after('document_type');
            $table->date('birth_date')->nullable()->after('document_number');
            $table->string('phone', 20)->nullable()->after('birth_date');
            
            // Timestamps de auditoría legal
            $table->timestamp('terms_accepted_at')->nullable()->after('phone');
            $table->timestamp('privacy_accepted_at')->nullable()->after('terms_accepted_at');
            
            // Socialite
            $table->string('google_id')->nullable()->unique()->after('privacy_accepted_at');
            $table->string('avatar')->nullable()->after('google_id');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'document_type', 'document_number', 'birth_date', 'phone', 
                'terms_accepted_at', 'privacy_accepted_at', 'google_id', 'avatar'
            ]);
        });
    }
};