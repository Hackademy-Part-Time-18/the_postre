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
            'name' => 'admin',
            'email' => 'admin@thepostre.it',
            'password' => bcrypt('12345678'),
            'is_admin' => true,
        ]); 
        $user2 = User::create([
            'name' => 'revisor',
            'email' => 'revisor@thepostre.it',
            'password' => bcrypt('12345678'),
            'is_revisor' => true,
        ],);
        $user4 = User::create([
            'name' => 'User',
            'email' => 'user@thepostre.it',
            'password' => bcrypt('12345678'),
        ],);
        $user4 = User::create([
            
            'name' => 'writer',
            'email' => 'writer@thepostre.it',
            'password' => bcrypt('12345678'),
            'is_writer' => true,
        
        ],);
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        User::where('email' , 'admin@thepostre.it')->delete();
        User::where('email' , 'writer@writer.it')->delete();
        User::where('email' , 'revisor@revisor.it')->delete();
        User::where('email' , 'example@example.it')->delete();

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_admin', 'is_revisor', 'is_writer']);
        });
    }
};
