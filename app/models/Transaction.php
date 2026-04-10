<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ["type", "amount", "reason", "timestamp"];

    public static function createTransaction($type, $amount, $reason)
    {
        return self::create([
            'type' => $type,
            'amount' => $amount,
            'reason' => $reason,
            'timestamp' => now(),
        ]);
    }
}