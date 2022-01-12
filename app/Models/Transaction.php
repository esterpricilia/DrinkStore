<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transaction";
    protected $primaryKey = 'id_transaction';
    protected $fillable =[
        'id',
        'user_id',
        'date'
    ];

   

}
