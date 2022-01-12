<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    protected $table = "transaction_detail";
    protected $primaryKey = 'id_transaction_detail';
    protected $fillable =[
        'transaction_id',
        'product_id', 
        'quantity', 
        'subtotal'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
