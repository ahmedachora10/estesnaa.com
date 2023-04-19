<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventionOrder extends Model
{
    use HasFactory;

    protected $fillable = ['buyer_id', 'transaction_id', 'invention_id', 'amount'];

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }

    public function invention()
    {
        return $this->belongsTo(Invention::class, 'invention_id');
    }

}
