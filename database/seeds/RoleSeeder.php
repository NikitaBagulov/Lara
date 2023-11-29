<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Администратор']);
        Role::create(['name' => 'Модератор']);
        Role::create(['name' => 'Пользователь']);
        Role::create(['name' => 'Редактор']);
        Role::create(['name' => 'Экскаватор']);
        Role::create(['name' => 'Трактор']);
    }
}
