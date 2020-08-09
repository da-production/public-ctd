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
            $table->integer('privilage');
            $table->integer('agences_id');
            $table->string('user')->unique();
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->string('password',255);
            $table->string('email',45);
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('etat');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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