<?php

use Illuminate\Database\Seeder;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Role::class, 1)->create(['name' => 'admin']);
        factory(\App\Role::class, 1)->create(['name' => 'auditor']);
        factory(\App\Role::class, 1)->create(['name' => 'usuario']);

        User::create([
            'name'=>'admin',
            'email'=>'admin@mail.com',
            'password'=>bcrypt('123'),
            'role_id' => \App\Role::ADMIN
        ]);
    }
}
