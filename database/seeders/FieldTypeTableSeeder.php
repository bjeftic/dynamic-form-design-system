<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FieldTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('field_types')->insert([
            array('name' => 'text'),
            array('name' => 'amount'),
            array('name' => 'date'),
        ]);
    }
}
