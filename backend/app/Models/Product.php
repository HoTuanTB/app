<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'shopify_product_id',
        'title',
        'body_html',
        'product_type',
        'handle',
        'tags',
        'status',
        'admin_graphql_api_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
