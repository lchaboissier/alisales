<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Category extends ApiModel
{
    protected $fillable = ['id','name','parent_id'];

    public static function all($columns=array())
    {
        return self::map(self::get('category'));
    }

    public static function find($id)
    {
        $response = self::get('category/'.$id);
        $category = self::map($response)->first();
        $category->products = Product::map($response->products);
        $category->children = self::map($response->children);
        return $category;
    }

    public function resolveRouteBinding($value, $field = null)
    {
        return self::find($value);
    }

}
