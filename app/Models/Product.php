<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'price_old',
        'price_new',
        'active',
        'image',
        'size',
        'tag'
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Category::class,
            'id',
            'category_id')
            ->withDefault(['name' => '']);
    }
    public function comments()
    {
        # code... Nếu đã tạo đúng định dạng khóa ngoại
        # và khóa chính thì có thể bỏ qua 2 tham số đằng sau
        return $this->hasMany(Comment::class,'product_id','id');
    }
    public function orders()
    {
       return $this->hasMany(Product::class,'product_id','id');
    }


}
