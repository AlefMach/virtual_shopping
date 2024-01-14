<?php

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 *
 * Eloquent Model representing the 'product' table in the database.
 */
class ProductModel extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'type_id', 'price', 'image_path'];

    /**
     * Relationship with the ProductTypeModel.
     *
     * Each product belongs to a product type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productType() {
        return $this->belongsTo(ProductTypeModel::class, 'type_id');
    }
}
