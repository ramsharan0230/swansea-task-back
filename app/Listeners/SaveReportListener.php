<?php

namespace App\Listeners;

use App\Events\SaveReport;
use App\Models\Report;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class SaveReportListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SaveReport $event): void
    {
        $data = $event->data;

        $existingReportsCount = Report::where('ip_address', $data['ipAddress'])->count();
        $version = $existingReportsCount + 1;

        // save file in directory
        $filePath = "reports/{$data['filename']}";
        if (isset($data['content'])) {
            $result = Storage::disk('public')->put($filePath, $data['content']);
            Log::info('File save result', [
                'path' => $filePath,
                'result' => $result,
                'size' => strlen($data['content'])
            ]);
        }

        $url = "/storage/$filePath";

        Report::create([
            'name'         => $data['filename'],
            'version'      => $version,
            'ip_address'   => $data['ipAddress'] ?? null,
            'report_type'  => $data['reportType'] ?? null,
            'url'          => $url,
        ]);
    }
}
