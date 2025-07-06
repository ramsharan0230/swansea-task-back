<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasSlug, HasFactory;

    protected $table="products";
    
    protected $fillable=[
        'name', 
        'slug',
        'quantity', 
        'trade_price', 
        'retail_price', 
        'mpn', 
        'sku', 
        'status',
    ];
    
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
