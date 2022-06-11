<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserSeeder::class);

        for ($i=1; $i < 11; $i++) { 

        DB::table('assets_groups')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_manufacturers')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_cost_codes')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_statuses')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_categories')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_scancode_types')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_use_terms')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_ownership_types')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('location_types')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('location_statuses')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('location_hierarchies')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('user_roles')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('user_types')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('user_responsibilities')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('user_languages')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);
        
        DB::table('movement_statuses')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);
        
        DB::table('movement_cost_centers')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('movement_task_codes')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);
        
        DB::table('services')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);
        
        DB::table('service_statuses')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);
        
        DB::table('companies')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);
        
///


        DB::table('users')->insert([
            'surname' => Str::random(),
            'name' => Str::random(),
            'patronymic' => Str::random(),
            'email' => Str::random(5) . '@' . Str::random(5) . '.com',
            'password' => Hash::make(Str::random()),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'login' => Str::random(),
            'position' => Str::random(),
            'user_role_id' => $i,
            'user_type_id' => $i,
            'user_responsibility_id' => $i,
            'user_language_id' => $i,
            'company_id' => $i,
        ]);
        
        DB::table('users_images')->insert([
            'filename' => Str::random() . '.jpg',
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'user_ref_id' => $i,
        ]);
        
        DB::table('users_attachments')->insert([
            'filename' => Str::random() . '.pdf',
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'user_ref_id' => $i,
        ]);
        
        DB::table('locations')->insert([
            'name' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'location_type_id' => $i,
            'location_status_id' => $i,
            'location_hierarchy_id' => $i,
            'location_manager_id' => $i,
            'location_parent_id' => $i,
            'company_id' => $i,
        ]);
        
        DB::table('assets')->insert([
            'model' => Str::random(),
            'description' => Str::random(),
            'name' => Str::random(),
            'scancode' => Str::random(),
            'serial_number' => Str::random(),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'assets_group_id' => $i,
            'assets_manufacturer_id' => $i,
            'assets_cost_code_id' => $i,
            'assets_status_id' => $i,
            'assets_category_id' => $i,
            'assets_scancode_type_id' => $i,
            'assets_use_terms_id' => $i,
            'assets_ownership_type_id' => $i,
            'company_id' => $i,
            'default_location_id' => $i,
            'current_location_id' => $i,
        ]);
        
        DB::table('assets_images')->insert([
            'filename' => Str::random() . '.jpg',
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'asset_ref_id' => $i,
        ]);
        
        DB::table('assets_attachments')->insert([
            'filename' => Str::random() . '.pdf',
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'asset_ref_id' => $i,
        ]);
        
        DB::table('movements')->insert([
            'movement_number' => rand(1, 15),
            'app_used' => Str::random(),
            'comments' => Str::random(20),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'confirmed_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'returned_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'asset_id' => $i,
            'location_from_id' => $i,
            'location_to_id' => $i,
            'user_send_id' => $i,
            'user_recieved_id' => $i,
            'user_writed_id' => $i,
            'user_comfirmed_id' => $i,
            'movement_status_id' => $i,
            'movement_cost_center_id' => $i,
            'movement_task_code_id' => $i,
            'company_id' => $i,
        ]);
        
        DB::table('movements_attachments')->insert([
            'filename' => Str::random() . '.pdf',
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'movement_ref_id' => $i,
        ]);
        
        DB::table('services_histories')->insert([
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'asset_id' => $i,
            'service_id' => $i,
            'service_status_id' => $i,
            'company_id' => $i,
        ]);
        }
    }
}
