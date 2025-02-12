<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Add the search() method here
    public function search(Request $request)
    {
        // Perform the search logic, for example:
        $query = $request->input('search');

        // Searching for tasks or lists that match the search term
        $results = Task::where('name', 'like', '%' . $query . '%')->get();

        // Return a view with the search results
        return view('pages.home', ['results' => $results]);
    }

    // Other methods in your controller (index, etc.)
    public function index()
    {
        return view('pages.home');
    }
}
