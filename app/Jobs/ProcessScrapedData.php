<?php

namespace App\Jobs;

use WebScraper\ApiClient\Client;
use WebScraper\ApiClient\Reader\JsonReader;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;

class ProcessScrapedData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $scrapingJobId;

    public function __construct($scrapingJobId)
    {
        $this->scrapingJobId = $scrapingJobId;
    }

    public function handle()
    {
        $client = new Client([
            'token' => env('WEB_SCRAPER_API_TOKEN'),
        ]);

        $outputFile = storage_path("app/scrapingjob-data-{$this->scrapingJobId}.json");

        try {
            $client->downloadScrapingJobJSON($this->scrapingJobId, $outputFile);

            $reader = new JsonReader($outputFile);
            $rows = $reader->fetchRows();

            foreach ($rows as $row) {
                Book::updateOrCreate(
                    ['isbn' => $row['isbn'] ?? null],
                    [
                        'title' => $row['title'] ?? 'Unknown',
                        'author' => $row['author'] ?? 'Unknown',
                        'price' => $row['price'] ?? null,
                        'description' => $row['description'] ?? null,
                    ]
                );
            }
        } finally {
            unlink($outputFile);
        }

        $client->deleteScrapingJob($this->scrapingJobId);
    }
}
