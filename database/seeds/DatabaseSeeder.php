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
            'name' => array_rand(array_flip(['Ручной', 'Электро', 'Бензо'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_manufacturers')->insert([
            'name' => array_rand(array_flip(['Bosh', 'Hilti', 'Patriot', 'Makita'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_cost_codes')->insert([
            'name' => array_rand(array_flip(['20', '23', '25', '29', '91'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_statuses')->insert([
            'name' => array_rand(array_flip(['Рабочий', 'В ремонте', 'Списан'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_categories')->insert([
            'name' => array_rand(array_flip(['Уникальный', 'Обычный', 'Редкий'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_scancode_types')->insert([
            'name' => array_rand(array_flip(['Штрихкод', 'Магнитная метка', 'QR-код'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_use_terms')->insert([
            'name' => array_rand(array_flip(['Активный', 'Пассивный'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('assets_ownership_types')->insert([
            'name' => array_rand(array_flip(['Собственность', 'Аренда', 'Лизинг'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('location_types')->insert([
            'name' => array_rand(array_flip(['Склад', 'Стройплощадка', 'Объект'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('location_statuses')->insert([
            'name' => array_rand(array_flip(['Активный', 'Пассивный', 'Под вопросом'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('location_hierarchies')->insert([
            'name' => array_rand(array_flip(['Администрация', 'Основная', 'Отдельная'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('user_roles')->insert([
            'name' => array_rand(array_flip(['Наладчик', 'Просмотр', 'Нет доступа', 'Админ'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('user_types')->insert([
            'name' => array_rand(array_flip(['Постоянный', 'Временный', 'Уволен'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('user_responsibilities')->insert([
            'name' => array_rand(array_flip(['Менеджер', 'Ответственный', 'Мастер'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('user_languages')->insert([
            'name' => array_rand(array_flip(['Русский', 'English', 'Spanish'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);
        
        DB::table('movement_statuses')->insert([
            'name' => array_rand(array_flip(['Подтверждено', 'Ожидание', 'Отказ'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);
        
        DB::table('movement_cost_centers')->insert([
            'name' => array_rand(array_flip(['1', '2', '3'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);

        DB::table('movement_task_codes')->insert([
            'name' => array_rand(array_flip(['1', '2', '3'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);
        
        DB::table('services')->insert([
            'name' => array_rand(array_flip(['Зарядка', 'Поверка', 'Ремонт'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);
        
        DB::table('service_statuses')->insert([
            'name' => array_rand(array_flip(['Критический', 'Обычный', 'Разовый'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);
        
        DB::table('companies')->insert([
            'name' => array_rand(array_flip(['ООО Ромашка', 'ОА Старс', 'ИП Иванов'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
        ]);
        
///


        DB::table('users')->insert([
            'surname' => array_rand(array_flip(['Иванов', 'Петров', 'Сидоров'])),
            'name' => array_rand(array_flip(['Иван', 'Петр', 'Егор'])),
            'patronymic' => array_rand(array_flip(['Васильевич', 'Олегович', 'Матвеевич'])),
            'email' => Str::random(5) . '@' . 'mail.com',
            'password' => Hash::make(Str::random(5)),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'login' => Str::random(5),
            'position' => array_rand(array_flip(['Инженер', 'Мастер', 'Монтажник'])),
            'user_role_id' => rand(1, $i),
            'user_type_id' => rand(1, $i),
            'user_responsibility_id' => rand(1, $i),
            'user_language_id' => rand(1, $i),
            'company_id' => rand(1, $i),
        ]);
        
        DB::table('users_images')->insert([
            'filename' => Str::random(5) . '.jpg',
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'user_ref_id' => rand(1, $i),
        ]);
        
        DB::table('users_attachments')->insert([
            'filename' => Str::random(5) . '.pdf',
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'user_ref_id' => rand(1, $i),
        ]);
        
        DB::table('locations')->insert([
            'name' => array_rand(array_flip(['АЗП', 'АЗС', 'МДК'])),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'location_type_id' => rand(1, $i),
            'location_status_id' => rand(1, $i),
            'location_hierarchy_id' => rand(1, $i),
            'location_manager_id' => rand(1, $i),
            'location_parent_id' => rand(1, $i),
            'company_id' => rand(1, $i),
        ]);
        
        DB::table('assets')->insert([
            'model' => array_rand(array_flip(['5903К', 'AG125-13', 'ARX UD-3'])),
            'description' => Str::random(),
            'name' => array_rand(array_flip(['Фен', 'Болгарка', 'Дрель'])),
            'scancode' => Str::random(5),
            'serial_number' => Str::random(5),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'assets_group_id' => rand(1, $i),
            'assets_manufacturer_id' => rand(1, $i),
            'assets_cost_code_id' => rand(1, $i),
            'assets_status_id' => rand(1, $i),
            'assets_category_id' => rand(1, $i),
            'assets_scancode_type_id' => rand(1, $i),
            'assets_use_terms_id' => rand(1, $i),
            'assets_ownership_type_id' => rand(1, $i),
            'company_id' => rand(1, $i),
            'default_location_id' => rand(1, $i),
            'current_location_id' => rand(1, $i),
        ]);
        
        DB::table('assets_images')->insert([
            'filename' => Str::random(5) . '.jpg',
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'asset_ref_id' => rand(1, $i),
        ]);
        
        DB::table('assets_attachments')->insert([
            'filename' => Str::random(5) . '.pdf',
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'asset_ref_id' => rand(1, $i),
        ]);
        
        DB::table('movements')->insert([
            'app_used' => array_rand(array_flip(['Вэб', 'Мобиль', 'SSH'])),
            'comments' => Str::random(20),
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'confirmed_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'returned_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'location_from_id' => rand(1, $i),
            'location_to_id' => rand(1, $i),
            'user_send_id' => rand(1, $i),
            'user_recieved_id' => rand(1, $i),
            'user_writed_id' => rand(1, $i),
            'user_comfirmed_id' => rand(1, $i),
            'movement_status_id' => rand(1, $i),
            'movement_cost_center_id' => rand(1, $i),
            'movement_task_code_id' => rand(1, $i),
            'company_id' => rand(1, $i),
        ]);
        
        DB::table('movements_attachments')->insert([
            'filename' => Str::random(5) . '.pdf',
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'movement_ref_id' => rand(1, $i),
        ]);
        
        DB::table('services_histories')->insert([
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'asset_id' => rand(1, $i),
            'service_id' => rand(1, $i),
            'service_status_id' => rand(1, $i),
            'company_id' => rand(1, $i),
        ]);

        DB::table('assets_lists')->insert([
            'created_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'updated_at' => date_format( date_create() , 'Y-m-d H:i:s'),
            'asset_id' => rand(1, $i),
            'movement_id' => rand(1, $i),
        ]);
        }
    }
}
