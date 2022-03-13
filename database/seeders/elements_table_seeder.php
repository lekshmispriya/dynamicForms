<?php

namespace Database\Seeders;

use App\Models\elements;
use Illuminate\Database\Seeder;

class elements_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        elements::truncate();

        $elements =  [
                        ['name' => 'textbox'],
                        ['name' => 'number'],
                        ['name' => 'select']
                    ];

        elements::insert($elements);
    }
}
