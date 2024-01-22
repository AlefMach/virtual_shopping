<?php

use Illuminate\Database\Eloquent\Model;

include './models/ProductModel.php';
include './models/ProductTypeModel.php';

/**
 * Class CartModel
 *
 * Represents the shopping cart model in the database.
 * Extends the Eloquent Model class for interacting with the database.
 */
class CartModel extends Model {
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cart';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'quantity', 'total_price', 'user_id'];

    /**
     * Define a relationship with the ProductModel.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product() {
        return $this->belongsTo(ProductModel::class, 'product_id');
    }

    /**
     * Define a relationship with the UserModel.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

    /**
     * Get details of products in the shopping cart by user ID.
     *
     * @param int $userId The ID of the user associated with the shopping cart.
     * @return Illuminate\Database\Eloquent\Collection A collection of cart details.
     */
    public static function getByUserId($userId) {
        return CartModel::where('cart.user_id', $userId)
            ->join('product', 'cart.product_id', '=', 'product.id')
            ->join('product_type', 'product.type_id', '=', 'product_type.id')
            ->select(
                'cart.*', 
                'product.name as product_name',
                'product.image_path as image_path',
                'product.price as product_price', 
                'product_type.tax_rate as tax_rate'
            )
            ->get();
    }
}
