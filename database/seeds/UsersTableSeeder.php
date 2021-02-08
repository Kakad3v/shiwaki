<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // DB::table('role_user')->truncate();


        $ownerRole = Role::where('name', 'owner')->first();
        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $owner = User::create([
            'name' => 'Suleiman Nassor',
            'email' => 'sule.appdev@gmail.com',
            'username' => 'Kakad3v',
            'password' => Hash::make('password')
        ]);

        $owner = User::create([
            'name' => 'Junaid Suleiman',
            'email' => 'junai@gmail.com',
            'username' => 'JuneBoy',
            'password' => Hash::make('password')
        ]);

        $admin = User::create([
            'name' => 'Fatma Shafii',
            'email' => 'fatma.shafii@gmail.com',
            'username' => 'Fafi',
            'password' => Hash::make('password')
        ]);

        $admin = User::create([
            'name' => 'Adil Alamin',
            'email' => 'adil@gmail.com',
            'username' => 'Fafi',
            'password' => Hash::make('password')
        ]);

        $author = User::create([
            'name' => 'Salama Bondi',
            'email' => 'salama.bondi@gmail.com',
            'username' => 'Mamake',
            'password' => Hash::make('password')
        ]);

        $user = User::create([
            'name' => 'Chimama Suleiman',
            'email' => 'chima.suleiman@gmail.com',
            'username' => 'Chimz',
            'password' => Hash::make('password')
        ]);

        $owner->roles()->attach($ownerRole);
        $owner->roles()->attach($ownerRole);
        $admin->roles()->attach($adminRole);
        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
