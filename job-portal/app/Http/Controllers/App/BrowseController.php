<?php

namespace App\Http\Controllers\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use App\Category;
use App\Location;
use App\Type;

class BrowseController extends Controller
{
    /**
     * Display One Job Function
     */
    public function job($jobID)
    {
        if(Job::where('id',$jobID)->count('id') > 0)
        {
            $job = Job::find($jobID);
            return view('app.job',compact('job',$job));
        }
        else
        {
            return redirect(route('home'));
        }
    }

    /**
     *
     */
    public function jobsBrowse($by)
    {
        switch ($by) {
            case 'category':
                $catID = isset($_GET['catID']) ? intVal($_GET['catID']) : 0;
                return view('app.jobs')->with([
                    'job'  => Category::find($catID)
                ]);
                break;
            case 'location':
                $locID = isset($_GET['locID']) ? intVal($_GET['locID']) : 0;
                return view('app.jobs')->with([
                    'job'  => Location::find($locID)
                ]);
                break;
            case 'type':
                $typeID = isset($_GET['typeID']) ? intVal($_GET['typeID']) : 0;
                return view('app.jobs')->with([
                    'job' => Type::find($typeID)
                ]);
                break;

            case 'search':
                $searchQuery = isset($_GET['searchText']) ? $_GET['searchText'] : '';
                $results = Job::where('title','LIKE', '%' . $searchQuery .'%')
                                ->orWhere('description','LIKE', '%' . $searchQuery .'%')
                                ->orWhere('qualifications','LIKE', '%' . $searchQuery .'%')
                                ->orWhere('expected_salary','LIKE', '%' . $searchQuery .'%')
                                ->orWhere('apply_email','LIKE', '%' . $searchQuery .'%')
                                ->get();
                return view('app.jobs')->with([
                    'job' => $results
                ]);
                break;

            default:
                return redirect(route('home'));
                break;
        }
    }

}
