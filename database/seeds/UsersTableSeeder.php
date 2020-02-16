<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert(array(
            0 => array(
                'id' => 1,
                'name' => 'Cezar',
                'cpf' => '11111111111',
                'phone' => '82999999999',
                'created_at' => Carbon::now()
            ),
            1 => array(
                'id' => 2,
                'name' => 'Pereira',
                'cpf' => '22222222222',
                'phone' => '82888888888',
                'created_at' => Carbon::now()
            ),
        ));
    }
}
