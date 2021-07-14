<?php

use Illuminate\Database\Seeder;

class sampleAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $param = [
            'name' => 'taku',
            'email' => 'taku@com',
            'password' => '00000000',
            'is_experience' => 1,
        ];
        DB::table('users')->insert($param);
    }
}
