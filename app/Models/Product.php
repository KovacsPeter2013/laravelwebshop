<?php

namespace App\Models;
use App\Models\Attributevalue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model{



    use HasFactory;
    protected $table = "products";



    public function category(){


    	return $this->belongsTo(Category::class, 'category_id');
    }



    public function attributeValues(){

        return $this->hasMany(Attributevalue::class, 'product_id');
    }

}
