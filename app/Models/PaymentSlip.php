<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentSlip extends Model
{
    protected $table = 'paymentslips';
    
    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id'
        );
    }
}
