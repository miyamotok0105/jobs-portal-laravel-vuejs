<?php
namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use App\Company;
use App\Location;
use App\Type;
use App\Job;

class HomeController extends Controller
{
    public function index()
    {
        $count_users      = User::count('id');
        $count_categories = Category::count('id');
        $count_companies  = Company::count('id');
        $count_locations  = Location::count('id');
        $count_types      = Type::count('id');
        $count_jobs       = Job::count('id');
        $counter = [
            'users'      => $count_users,
            'categories' => $count_categories,
            'companies'  => $count_companies,
            'locations'  => $count_locations,
            'types'      => $count_types,
            'jobs'       => $count_jobs
        ];
        return view('dashboard.home.index')->with([
            'counter' => $counter
        ]);
    }
}
