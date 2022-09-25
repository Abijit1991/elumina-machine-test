<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Status;

class CreateStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status');
            $table->string('class');
            $table->timestamps();
        });

        Status::firstOrCreate(["status" => "in review", "class" => "dark"]);
        Status::firstOrCreate(["status" => "approved", "class" => "success"]);
        Status::firstOrCreate(["status" => "pending", "class" => "info"]);
        Status::firstOrCreate(["status" => "rejected", "class" => "danger"]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statuses');
    }
}
