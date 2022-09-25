<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddColumnUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            if (Schema::hasColumn('users', 'userrole_id')) {
                DB::statement('Alter table users alter userrole_id set default 3');

                $table->foreign('userrole_id')->references('id')->on('userroles')->onDelete('cascade');
            }
        });

        User::firstOrCreate(
            [
                "userrole_id" => 1, "name" => "admin",
                "email" => "admin@gmail.com", "password" => Hash::make('admin123')
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['userrole_id']);
        });
    }
}
