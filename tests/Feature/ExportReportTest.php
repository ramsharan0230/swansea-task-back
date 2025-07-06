<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class ExportReportTest extends TestCase
{
    /**
     * A basic pdf generation test for pdf generation.
    */
    public function test_pdf_export_successful(): void
    {
        $payload = $this->validPayload('pdf');
        $response = $this->postJson(route('report.export'), $payload);
        $response->assertStatus(Response::HTTP_OK);
        $response->assertHeader('Content-Type', 'application/pdf');

        $this->assertMatchesRegularExpression(
            '/attachment; filename=summary-\d{8}_\d{6}\.pdf/',
            $response->headers->get('Content-Disposition')
        );
    }

    /**
     * A basic csv generation test for csv generation.
    */
    public function test_csv_export_successful(): void
    {
        $payload = $this->validPayload('csv');
        $response = $this->postJson(route('report.export'), $payload);
        $response->assertStatus(Response::HTTP_OK);

        $this->assertTrue(
            str_starts_with($response->headers->get('Content-Type'), 'text/csv'),
            'Content-Type header should start with "text/csv"'
        );

        $this->assertMatchesRegularExpression(
            '/attachment; filename="?quote-summary-\d{8}_\d{6}\.csv"?/',
            $response->headers->get('Content-Disposition')
        );
    }


    /**
     * validation.
    */
    public function test_invalid_report_type_returns_error(): void
    {
        $payload = $this->validPayload('invalid_type');
        $response = $this->postJson(route('report.export'), $payload);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('reportType');
    }

    protected function validPayload(string $reportType): array
    {
        return [
            'reportType' => $reportType,
            'selectedItems' => [
                [
                    'selectedProduct' => 'Widget A',
                    'quantity' => 10,
                    'cost' => 5.50,
                    'sell' => 10.00,
                ]
            ],
            'laborHours' => 8,
            'laborCost' => 15,
            'fixedOverheads' => 50,
            'targetMargin' => 30,
            'ai_suggestions' => 'Consider reducing costs for Widget A.'
        ];
    }
}
