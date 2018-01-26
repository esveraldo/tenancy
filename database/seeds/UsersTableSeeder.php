<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(\App\User::class,1)->create([
        'name' => 'Cliente1',
        'email' => 'cliente1@user.com',
        'password' => bcrypt('secret'),
        'account' => str_random(5)
      ]);

      Factory(\App\User::class, 1)->create([
        'name' => 'Cliente2',
        'email' => 'cliente2@user.com',
        'password' => bcrypt('secret'),
        'account' => str_random(5)
      ]);
    }
}
