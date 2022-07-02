<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $addTables = array(
        'assets',
        'assets_attachments',
        'assets_categories',
        'assets_cost_codes',
        'assets_groups',
        'assets_images',
        'assets_lists',
        'assets_manufacturers',
        'assets_ownership_types',
        'assets_scancode_types',
        'assets_statuses',
        'assets_use_terms',
        'companies',
        'failed_jobs',
        'locations',
        'location_hierarchies',
        'location_statuses',
        'location_types',
        'migrations',
        'movements',
        'movements_attachments',
        'movement_cost_centers',
        'movement_statuses',
        'movement_task_codes',
        'password_resets',
        'services',
        'services_histories',
        'service_statuses',
        'users',
        'users_attachments',
        'users_images',
        'user_languages',
        'user_responsibilities',
        'user_roles',
        'user_types'
    );

    public function up()
    {
        foreach ($this->addTables as $addTable) {
            Schema::table($addTable, function (Blueprint $table) {
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->addTables as $addTable) {
            Schema::table($addTable, function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
        }
    }
}
