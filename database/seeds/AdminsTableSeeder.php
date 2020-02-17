<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->delete();
        DB::table('admins')->insert(
            array(
                0 => array(
                    'id' => 2,
                    'user' => 'admin',
                    'password' => Hash::make('admin'),
                ),
            )
        );
    }
}
