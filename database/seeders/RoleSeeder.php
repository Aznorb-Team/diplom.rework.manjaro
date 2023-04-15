<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'title' => 'Администратор',
        ]);
        DB::table('roles')->insert([
            'title' => 'Пользователь',
        ]);
        DB::table('roles')->insert([
            'title' => 'Эксперт по антиплагиату',
        ]);
        DB::table('roles')->insert([
            'title' => 'Эксперт РИС',
        ]);
        DB::table('roles')->insert([
            'title' => 'Заседание РИС',
        ]);
        DB::table('roles')->insert([
            'title' => 'Эксперт УМС',
        ]);
        DB::table('roles')->insert([
            'title' => 'Заседание УМС',
        ]);
        DB::table('roles')->insert([
            'title' => 'Заседание УМС',
        ]);
    }
}
