<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SearchQuery;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function saveSearchQuery(Request $request)
    {
        $query = $request->input('query');
        $id = $request->input('id');
        Log::info("Search query received: " . $query . ", Product ID: " . $id);

        // Check if the query already exists
        $searchQuery = SearchQuery::where('query', $query)->first();

        if ($searchQuery) {
            // Increment the search count
            $searchQuery->increment('search_count');
        } else {
            // Create a new search query entry
            SearchQuery::create(['query' => $query, 'id' => $id, 'search_count' => 1]);
        }

        Log::info("Search query saved successfully");

        return response()->json(['success' => true]);
    }
}
