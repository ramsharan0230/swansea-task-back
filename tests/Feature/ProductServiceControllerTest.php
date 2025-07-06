<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductServiceControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test for fetching all products/services.
     */
    public function test_fetches_all_products()
    {
        Product::factory()->count(2)->create();
        $response = $this->getJson(route('fetch-all-products'));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'payload' => [
                    '*' => [
                        'name',
                        'slug',
                        'quantity',
                        'trade_price',
                        'retail_price',
                        'mpn',
                        'sku',
                        'status',
                        'created_at',
                        'updated_at',
                        
                    ],
                ],
                'message',
                'status_code',
            ])
            ->assertJson([
                'message' => 'Products fetched successfully.',
                'status_code' => 200,
            ]);
    }
}
