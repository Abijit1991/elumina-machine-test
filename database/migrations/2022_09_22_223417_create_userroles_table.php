<?php

use App\Userrole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserrolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userroles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role');
            $table->timestamps();
        });

        Userrole::firstOrCreate(["role" => "admin"]);
        Userrole::firstOrCreate(["role" => "customer"]);
        Userrole::firstOrCreate(["role" => "guest-customer"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userroles');
    }
}
