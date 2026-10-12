<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model {
    use HasFactory;
    protected $fillable = ['sku','name','category_id','supplier_id','price','stock'];
    public function category() { return $this->belongsTo(Category::class); }
    public function supplier() { return $this->belongsTo(Supplier::class); }
    public function stockMovements() { return $this->hasMany(StockMovement::class); }
}
