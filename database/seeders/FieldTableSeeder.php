<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FieldTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('fields')->insert([
            array('form_id' => 1, 'field_type_id' => 1, 'value' => 'Some text'),
            array('form_id' => 1, 'field_type_id' => 2, 'value' => '1000'),
            array('form_id' => 2, 'field_type_id' => 1, 'value' => 'Another text'),
            array('form_id' => 2, 'field_type_id' => 2, 'value' => '1235000'),
            array('form_id' => 2, 'field_type_id' => 3, 'value' => '1988-01-01 00:00:00'),
            array('form_id' => 3, 'field_type_id' => 1, 'value' => 'Paycheck number'),
        ]);
    }
}
