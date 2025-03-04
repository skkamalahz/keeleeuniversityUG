@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Scraped Data</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Entry Requirement</th>
                <th>Fees and Funding</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data ?? [] as $item)
                <tr>
                    <td>{{ $item['course_name'] ?? 'N/A' }}</td>
                    <td>{{ $item['entry_requirement'] ?? 'N/A' }}</td>
                    <td>{{ $item['fees_and_funding'] ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection