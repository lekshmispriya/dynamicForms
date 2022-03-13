<?php

namespace Database\Seeders;

use App\Models\forms;
use Illuminate\Database\Seeder;

class formSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        forms::truncate();

        $elements =  [
                        ['name' => 'Form 1']
                    ];

       forms::insert($elements);
    }
}
