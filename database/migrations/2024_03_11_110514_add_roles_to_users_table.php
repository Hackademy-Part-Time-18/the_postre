<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->after('email')->nullable()->default(false);
            $table->boolean('is_revisor')->after('is_admin')->nullable()->default(false);
            $table->boolean('is_writer')->after('is_revisor')->nullable()->default(false);
        });

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@thepostre.it',
            'password' => bcrypt('12345678'),
            'is_admin' => true,
        ]); 
        $user2 = User::create([
            'name' => 'Revisor',
            'email' => 'revisor@thepostre.it',
            'password' => bcrypt('12345678'),
            'is_revisor' => true,
        ],);
        $user3 = User::create([
            'name' => 'User',
            'email' => 'user@thepostre.it',
            'password' => bcrypt('12345678'),
        ],);
        $user4 = User::create([
            
            'name' => 'Writer',
            'email' => 'writer@thepostre.it',
            'password' => bcrypt('12345678'),
            'is_writer' => true,
        
        ],);
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        User::where('email' , 'admin@thepostre.it')->delete();
        User::where('email' , 'writer@thepostre.it')->delete();
        User::where('email' , 'revisor@thepostre.it')->delete();
        User::where('email' , 'user@thepostre.it')->delete();

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'is_revisor', 'is_writer']);
        });
    }
};
