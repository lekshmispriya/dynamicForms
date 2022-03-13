<?php

namespace Database\Seeders;
use App\Models\form_contents;
use Illuminate\Database\Seeder;

class formcontentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        form_contents::truncate();

        $elements =  [
                        ['f_id' => '1',
                        'label'=>'name',
                        'type'=>'1',
                        'custom_values'=>''
                       ],
                       ['f_id' => '1',
                        'label'=>'mobile',
                        'type'=>'2',
                        'custom_values'=>''
                       ],
                       ['f_id' => '1',
                       'label'=>'gender',
                       'type'=>'2',
                       'custom_values'=>'["male","female","others"]'
                      ],
                    ];

    form_contents::insert($elements);
}
}