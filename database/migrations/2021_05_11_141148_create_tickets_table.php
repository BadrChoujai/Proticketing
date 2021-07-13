<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->text('description');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('status_id');
            $table->unsignedInteger('categorie_id');
            $table->unsignedInteger('priority_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('statuses')
                ->onDelete('cascade');
                $table->foreign('categorie_id')->references('id')->on('categories')
                ->onDelete('cascade');
                $table->foreign('priority_id')->references('id')->on('priorities')
                ->onDelete('cascade');
            // $table->integer('it_agent_id')->unssigned();
            // $table->foreign('it_agent_id')->references('id')->on('it_agents')
            //     ->onDelete('cascade');
                $table->timestamps();
        });
        // composer dump-autoload
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}