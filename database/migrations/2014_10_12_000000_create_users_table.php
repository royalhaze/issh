<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('mobile',11)->unique()->nullable();
            $table->unsignedTinyInteger('connection_limit')->default(0);
            $table->unsignedInteger('traffic_limit')->default(0);
            $table->dateTime('start_date')->nullable();
            $table->dateTime('expire_date')->nullable();
            $table->unsignedTinyInteger('start_after_use')->default(0);
            $table->string('password');
            $table->string('status',20)->default('active');
            $table->unsignedTinyInteger('user_type')->default(\App\Models\User::CLIENT_USER_TYPE);
            $table->text('text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
