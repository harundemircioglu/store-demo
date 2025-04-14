<?php

namespace Modules\Product\Repositories;

use Modules\Product\Interfaces\ProductInterface;
use Modules\Product\Models\Product;

class ProductRespository implements ProductInterface
{
    public function store(array $data)
    {
        $product = new Product();
        $product->user_id = auth()->id();
        $product->title = $data['title'];
        $product->slug = makeSlug($data['title']);
        $product->description = $data['description'];
        $product->save();
    }
}
