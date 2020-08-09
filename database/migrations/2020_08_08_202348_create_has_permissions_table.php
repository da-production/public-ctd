<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('has_permissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('previlage_id')->unsigned();
            $table->bigInteger('permission_id')->unsigned();
            $table->foreign('previlage_id')->references('id')->on('previlage');
            $table->foreign('permission_id')->references('id')->on('permissions');
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
        Schema::dropIfExists('has_permissions');
    }
}
