<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('location_type_id')->constrained();
            $table->foreignId('location_status_id')->constrained();
            $table->foreignId('location_hierarchy_id')->constrained();
            $table->foreignId('location_manager_id')->constrained('users');
            $table->integer('location_parent_id'); //родительская локиция для текущей, foreign key назанчить отдельно
            $table->foreignId('company_id')->constrained();

            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
}
