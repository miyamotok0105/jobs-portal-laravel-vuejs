<?php

namespace App\Http\Controllers\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\Type;
use App\Category;
use App\Location;

class HomeController extends Controller
{
    /**
     * Index - Home Page
     */
    public function index()
    {
        $types = Type::orderBy('name','asc')->get();
        $jobs = Job::orderBy('created_at','desc')->latest()->get();
        return view('app.home')->with([
            'jobs' => $jobs,
            'types' => $types
        ]);
    }

    /**
     * Categories Page
     */
    public function categories()
    {
        $categories = Category::orderBy('name','asc')->get();
        return view('app.categories')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Locations Page
     */
    public function locations()
    {
        $locations = Location::orderBy('name','asc')->get();
        return view('app.locations')->with([
            'locations' => $locations
        ]);
    }


}
