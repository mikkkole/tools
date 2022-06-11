<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            
            $table->foreignId('assets_group_id')->constrained();
            $table->foreignId('assets_manufacturer_id')->constrained();
            $table->foreignId('assets_cost_code_id')->constrained();
            $table->foreignId('assets_status_id')->constrained();
            $table->foreignId('assets_category_id')->constrained();
            $table->foreignId('assets_scancode_type_id')->constrained();
            $table->foreignId('assets_use_terms_id')->constrained();
            $table->foreignId('assets_ownership_type_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->foreignId('default_location_id')->constrained('locations');
            $table->foreignId('current_location_id')->constrained('locations');
            
            $table->string('model');
            $table->string('description');
            $table->string('name');
            $table->string('scancode');
            $table->string('serial_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assets');
    }
}
