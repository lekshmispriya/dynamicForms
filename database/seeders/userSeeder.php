<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $elements =  [
            
                        ['name'=>'Admin',
                        'email'=>'Admin@gmail.com',
                        'password'=>'$2y$10$14Z90mUg2NGCGwRiTwp.ZuTtVSzuEX//YVnjKHcAkkswcnKeEZokG']
                    ];

                    User::insert($elements);
    }
}
