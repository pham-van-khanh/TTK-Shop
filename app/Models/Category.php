<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description',
        'image',
        'slug',
        'active'
    ];
    public function products()
    {
       return $this->hasMany(Product::class,'category_id','id');
    }
    public function scopeSearch($query)
    {
        if($key = request()->search){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
