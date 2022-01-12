<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table='product';
    protected $guarded=[]; 

    public function detail($id)
    {
        return DB::table('product')->where('id', $id)->first();
    }
    

}
