<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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

        DB::table('modes')->insert([
            'title' => 'учебное',
        ]);
        DB::table('modes')->insert([
            'title' => 'Научное',
        ]);
        DB::table('modes')->insert([
            'title' => 'Монография',
        ]);

        DB::table('question_type')->insert([
            'title' => 'Radio button',
        ]);
        DB::table('question_type')->insert([
            'title' => 'Text',
        ]);

        DB::table('status_application')->insert([
            'title' => 'Редактирование',
        ]);
        DB::table('status_application')->insert([
            'title' => 'Проверка на антиплагиат',
        ]);
        DB::table('status_application')->insert([
            'title' => 'Проверка экспертом РИС',
        ]);
        DB::table('status_application')->insert([
            'title' => 'Проверка заседанием РИС',
        ]);
        DB::table('status_application')->insert([
            'title' => 'Проверка экспертом УМС',
        ]);
        DB::table('status_application')->insert([
            'title' => 'Проверка заседанием УМС',
        ]);
        DB::table('status_application')->insert([
            'title' => 'Издательство',
        ]);

        DB::table('status_work')->insert([
            'title' => 'Занято',
        ]);
        DB::table('status_work')->insert([
            'title' => 'В работе',
        ]);

        DB::table('types')->insert([
            'title' => 'type_1',
        ]);
        DB::table('types')->insert([
            'title' => 'type_2',
        ]);

        DB::table('directions')->insert([
            'title' => 'Математика',
        ]);
        DB::table('directions')->insert([
            'title' => 'Информатика',
        ]);
    }
}
