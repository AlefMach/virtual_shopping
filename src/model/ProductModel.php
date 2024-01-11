<?php 

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $table = 'product';
    protected $fillable = ['name', 'type_id', 'price', 'image_path'];

    public function productType() {
        return $this->belongsTo(ProductTypeModel::class, 'type_id');
    }
}