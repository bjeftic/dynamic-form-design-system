<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FormTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('forms')->insert([
            array('name' => 'Form 1'),
            array('name' => 'Form 2'),
            array('name' => 'Form 3')
        ]);
    }
}
