<?php

namespace Tests\Feature;

use App\Services\OpenAIService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class SuggestionRequestTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic validation test for invalid inputs to fail.
    */
    public function test_validation_error_for_invalid_payload(): void
    {
        $invalidPayload = [];
        $response = $this->postJson(route('ai.suggestion'), $invalidPayload);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonStructure([
                'payload',
                'errors',
                'message',
                'status_code',
            ])
            ->assertJson([
                'payload' => null,
                'message' => 'Validation failed',
                'status_code' => Response::HTTP_UNPROCESSABLE_ENTITY,
            ]);
    }

    /**
     * A basic validation test for valid inputs to to pass it.
    */
    public function test_validate_with_valid_payload()
    {
        $mock = \Mockery::mock(OpenAIService::class);
        $mock->shouldReceive('generateSuggestion')
             ->once()
             ->andReturn('Mocked AI suggestion response.');

        $this->app->instance(OpenAIService::class, $mock);

        $validPayload = [
            'selectedItems' => [
                [
                    'selectedProduct' => 'Product A',
                    'cost' => 10.0,
                    'sell' => 15.0,
                    'quantity' => 2,
                ]
            ],
            'allProducts' => [
                [
                    'name' => 'Product A',
                    'mpn' => 'MPN123',
                    'sku' => 'SKU123',
                    'trade_price' => 8.0,
                    'retail_price' => 20.0,
                ]
            ],
            'laborHours' => 5,
            'laborCost' => 100,
            'fixedOverheads' => 50,
            'targetMargin' => 20,
            'grossProfit' => 150,
            'margin' => 0.25,
        ];

        $response = $this->postJson(route('ai.suggestion'), $validPayload);
        $response->assertStatus(Response::HTTP_OK)
             ->assertJson([
                 'message' => 'Suggestion fetched successfully',
                 'status_code' => Response::HTTP_OK,
                 'payload' => 'Mocked AI suggestion response.',
             ]);
    }
}
