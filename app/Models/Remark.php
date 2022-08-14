<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remark extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'user_id',
        'content',
        'status',
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
   public function repcomments()
   {
    # code...
        return $this->hasMany(Remark::class);
   }
}
