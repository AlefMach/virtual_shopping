<?php 


use Illuminate\Database\Eloquent\Model;

class ProductTypeModel extends Model {
    protected $table = 'product_type';
    protected $fillable = ['name', 'tax_rate'];
}