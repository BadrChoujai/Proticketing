<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('citie_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')
                ->onDelete('cascade');
            $table->foreign('citie_id')->references('id')->on('cities')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_citie_id_foreign');
            $table->dropForeign('users_role_id_foreign');
            $table->dropColumn('citie_id');
            $table->dropColumn('role_id');
         

        });
    }
}
