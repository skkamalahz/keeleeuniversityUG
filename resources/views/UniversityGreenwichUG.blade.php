<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body {
                /* font-family: 'Instrument Sans', sans-serif;
                background: Black;
                color: #fff; 
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh; */
            }
        </style>
    </head>
    <body class="bg-gray-100 flex items-center justify-center min-h-screen m-0 p-0">
        <div class="container mx-auto p-4">
        <h1 class="text-4xl font-bold text-center mb-8 border-4 border-double border-indigo-500 rounded-md">University of Greenwich UG</h1>
            <div class="row m-4 p-4 gap-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-3">
                @foreach($posts as $post)
                <div class="max-w-2xl bg-white shadow-lg rounded-lg overflow-hidden flex flex-col">
                    <div class="relative">
                        <img class="w-full h-48 object-cover" src="https://foundr.com/wp-content/uploads/2023/04/How-to-create-an-online-course.jpg.webp" alt="Course Image">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $post->CourseName }}</h2>
                        <p class="text-gray-600 mt-2">{{ $post->CourseShortOverview }}</p>
                        
                        <div class="mt-4 space-y-2 flex-grow">
                            <p class="text-gray-700"><strong>Entry Requirement:</strong> {{ $post->EntryRequirement }}</p>
                            <p class="text-gray-700"><strong>Fees & Funding:</strong> {{ $post->FeesAndFunding }}</p>
                            <p class="text-gray-700"><strong>Course Duration:</strong> {{ $post->Duration }}</p>
                            <p class="text-gray-700"><strong>Intakes:</strong> {{ $post->Intakes }}</p>
                        </div>
                        
                        <button class="mt-4 w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 mb-4">Enroll Now</button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>