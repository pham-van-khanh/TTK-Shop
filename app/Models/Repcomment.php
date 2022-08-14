<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repcomment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'remark_id',
        'product_id',
        'content'
    ];
    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
        # code...
    }public function products()
    {
        return $this->belongsTo(Product::class,'product_id','id');
        # code...
    }
    public function remarks()
    {
        return $this->belongsTo(Remark::class,'remark_id','id');
    }
}
