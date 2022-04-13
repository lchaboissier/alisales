<?php

namespace App\Models;


class Product extends ApiModel
{
    protected $fillable = ['id', 'ref', 'name', 'description', 'price', 'category_id'];

    protected $casts=['price'=>'float'];

    public static function findWithRef($ref)
    {
        $response = self::get('productbyref/'.$ref);
        $product = self::map($response)->first();
        return $product;
    }

    public static function find($id)
    {
        $response = self::get('product/'.$id);
        $product = self::map($response)->first();
        $product->category = Category::find($product->category_id);
        return $product;
    }

    public static function findByRef($ref)
    {
        $response = self::get('productbyref/'.$ref);
        $product = self::map($response)->first();
        $product->category = Category::find($product->category_id);
        return $product;
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return self::find($value);
    }

}
