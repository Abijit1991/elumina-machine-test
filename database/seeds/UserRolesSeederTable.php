<?php

use App\Userrole;
use Illuminate\Database\Seeder;

class UserRolesSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $this->addUserRoles();
    }

    public function addUserRoles()
    {
        $userroles = [['role' => 'admin'], ['role' => 'customer']];

        foreach ($userroles as $userrole) {
            Userrole::firstOrCreate([
                'role' => $userrole['role'],
            ]);

            unset($userrole);
        }
    }
}
