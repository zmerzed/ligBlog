<?php

use Illuminate\Database\Seeder;
use \App\Article;
use \App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

   		self::runUsers();

        // $this->call(UsersTableSeeder::class);
    }

    public static function runUsers()
    {
    	$admin = new User();

    	$admin->email = 'admin@admin.com';
    	$admin->username = 'admin';
    	$admin->isAdmin = true;
    	$admin->password = bcrypt('secret');
    	$admin->save();
    }
}
