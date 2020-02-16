<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sms')->delete();

        DB::table('sms')->insert(array(
            0 => array(
                'id' => 1,
                'date' => Carbon::now(),
                'message' => 'message teste',
                'user_id' => 1
            ),
            1 => array(
                'id' => 2,
                'date' => Carbon::now(),
                'message' => 'message teste1',
                'user_id' => 1
            ),
            2 => array(
                'id' => 3,
                'date' => Carbon::now(),
                'message' => 'message teste2',
                'user_id' => 2
            ),
        ));
    }
}
