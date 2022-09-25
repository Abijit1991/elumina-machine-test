<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->createAdminUser();
    }

    public function createAdminUser()
    {
        User::firstOrCreate([
            'userrole_id' => 1,
            'name' => 'admin',
            'password' => Hash::make('admin123'),
            'email' => 'admin@gmail.com',
        ]);
    }
}
