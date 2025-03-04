<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebScraperController;

Route::get('/', function () {
    $posts = DB::table('courses')->get();
    return view('welcome',[
        'posts' => $posts,
        //dd($posts)
    ]);
});

Route::get('/BangorUniversity', function () {
    $posts = DB::table('bangoruniversity')->get();
    return view('BangorUniversity',[
        'posts' => $posts,
        //dd($posts)
    ]);
});

Route::get('/UniversityGreenwichUG', function () {
    $posts = DB::table('universityofgreenwichug')->get();
    return view('UniversityGreenwichUG',[
        'posts' => $posts,
        //dd($posts)
    ]);
});

Route::get('/UniversityGreenwichPG', function () {
    $posts = DB::table('universityofgreenwichpg')->get();
    return view('UniversityGreenwichPG',[
        'posts' => $posts,
        //dd($posts)
    ]);
});

//Route::post('/webscraper/webhook', [WebScraperController::class, 'handleWebhook']);

Route::get('/scraper', [WebScraperController::class, 'fetchData']);
