<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $owner = Admin::create([
            'name' => 'admin' ,
            'phone' => '012345678' ,
            'img' => null ,
            'password' => bcrypt('12345678') ,
            'created_at'=>now(),
    ]);
    $owner->syncRoles(['admin' => 1]);

    //    for ($i=2; $i <10 ; $i++) {
    //         $admin = Admin::create([
    //             'name' =>$fake->name() ,
    //             'email' => $fake->unique()->email() ,
    //             'img' => 'admins/1.png' ,
    //             'email_verified_at' => now() ,
    //             'password' => bcrypt('password') ,
    //             'remember_token'=>Str::random(10),
    //             'created_at'=>now(),
    //         ]);

    //     $owner->hasRole('admin');
    // }
    }
}
