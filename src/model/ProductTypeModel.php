<?php

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductTypeModel
 *
 * Eloquent Model representing the 'product_type' table in the database.
 */
class ProductTypeModel extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'tax_rate'];
}
