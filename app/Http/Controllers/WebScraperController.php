<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebScraperController extends Controller
{
    // public function fetchData()
    // {
    //     $apiUrl = 'https://cloud.webscraper.io/jobs/data/28648019';
    //     $apiKey = env('70e285gNhFZdSjOwrPlSSs5eTRA3NjYFUtIDYYm4CQbR4BMhZmvDGXogD54u'); // Use environment variable for API key

    //     $response = Http::withHeaders([
    //         'Authorization' => "Bearer $apiKey"
    //     ])->get($apiUrl);

    //     if ($response->successful()) {
    //         $data = $response->json();
    //         return view('scraper.index', compact('data'));
    //     } else {

    //         \Log::error('Failed to fetch data', ['response' => $response->body()]);
    //         return back()->with('error', 'Failed to fetch data from the API. Please try again later.');
    //     }
    // }

    // public function fetchData()
    // {
    //         $response = Http::get('https://cloud.webscraper.io/jobs/data/28648019');
        
    //     if ($response->successful()) {
    //         $data = $response->json(); // Assuming the response is in JSON format
    //         return view('scraper.index', compact('data'));
    //     } else {
    //         \Log::error('Failed to fetch data', ['response' => $response->body()]);
    //         return back()->with('error', 'Failed to fetch data from the API. Please try again later.');
    //     }
    // }


    public function fetchData()
    {
        // Fetch or scrape data
        $data = $this->scrapeData();

        // Ensure $data is always an array
        if (is_null($data)) {
            $data = [];
        }

        // Pass data to the view
        return view('scraper.index', compact('data'));
    }

    private function scrapeData()
    {
        // Your scraping logic here
        // Example data
        return [
            [
                'course_name' => 'Course 1',
                'entry_requirement' => 'Requirement 1',
                'fees_and_funding' => 'Fees 1',
            ],
            [
                'course_name' => 'Course 2',
                'entry_requirement' => 'Requirement 2',
                'fees_and_funding' => 'Fees 2',
            ],
        ];
    }
}

