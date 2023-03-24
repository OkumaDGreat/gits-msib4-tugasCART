<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Product extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = ['product_name', 'product_description', 'photo','price', 'id_category']; 

    public function category()
	{
		return $this->belongsTo(Category::class, 'id_category');
	}

    public function products()
	{
		return $this->hasMany(Product::class, 'id');
	}
}