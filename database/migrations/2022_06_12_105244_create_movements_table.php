<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('asset_id')->constrained();
            $table->foreignId('location_from_id')->constrained('locations');
            $table->foreignId('location_to_id')->constrained('locations');
            $table->foreignId('user_send_id')->constrained('users');
            $table->foreignId('user_recieved_id')->constrained('users');
            $table->foreignId('user_writed_id')->constrained('users');
            $table->foreignId('user_comfirmed_id')->constrained('users');
            $table->foreignId('movement_status_id')->constrained();
            $table->foreignId('movement_cost_center_id')->constrained();
            $table->foreignId('movement_task_code_id')->constrained();
            $table->foreignId('company_id')->constrained();

            $table->integer('movement_number'); //в одном перемещении несколько id, активов
            $table->string('app_used');
            $table->string('comments');

            $table->dateTime('confirmed_at');
            $table->dateTime('returned_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
}
