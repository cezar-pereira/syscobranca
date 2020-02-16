<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PaymentSlipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paymentslips')->delete();

        DB::table('paymentslips')->insert(array(
            0 => array(
                'id' => 1,
                'dueDate' => Carbon::now(),
                'details' => 'detalhes do boleto',
                'grossIncome' => 500.00,
                'netIncome' => 500.00,
                'user_id' => 1,
                'created_at' => Carbon::now()
            ),
            1 => array(
                'id' => 2,
                'dueDate' => Carbon::now(),
                'details' => 'detalhes do boleto2',
                'grossIncome' => 850.00,
                'netIncome' => 850.00,
                'user_id' => 2,
                'created_at' => Carbon::now()
            ),
        ));
    }
}
