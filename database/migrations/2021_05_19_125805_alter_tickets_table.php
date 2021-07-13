<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->integer('citie_id')->unsigned();
            $table->foreign('citie_id')->references('id')->on('cities')
                ->onDelete('cascade');
            $table->integer('it_agent_id')->unsigned()->nullable();
            $table->foreign('it_agent_id')->references('id')->on('users')
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
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('tickets_citie_id_foreign');
            $table->dropColumn('citie_id');
            $table->dropForeign('tickets_it_agent_id_foreign');
            $table->dropColumn('it_agent_id');
        });
    }
}
