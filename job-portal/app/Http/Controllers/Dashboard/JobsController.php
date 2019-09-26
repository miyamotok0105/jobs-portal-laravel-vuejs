<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Job;
use DB;

class JobsController extends Controller
{
    public function fetch()
    {
        $jobs = Job::with(['category','company','location','type'])->orderBy('created_at','desc')->get();
        return $jobs;
    }

    public function store(Request $requets)
    {
        $this->validate($requets,[
            'category_id'    => 'required|integer',
            'location_id'    => 'required|integer',
            'company_id'     => 'required|integer',
            'type_id'        => 'required|integer',
            'title'          => 'required|string|max:191',
            'description'    => 'required|string',
            'qualifications' => 'required|string',
            'expected_salary'=> 'required|string|max:191',
            'apply_email'    => 'required|email'
        ]);

        return Job::create([
            'category_id'    => $requets->category_id,
            'type_id'        => $requets->type_id,
            'company_id'     => $requets->company_id,
            'location_id'    => $requets->location_id,
            'title'          => $requets->title,
            'description'    => $requets->description,
            'qualifications' => $requets->qualifications,
            'expected_salary'=> $requets->expected_salary,
            'apply_email'    => $requets->apply_email
        ]);
    }

    public function update(Request $requets)
    {
        $this->validate($requets,[
            'category_id'    => 'required|integer',
            'location_id'    => 'required|integer',
            'company_id'     => 'required|integer',
            'type_id'        => 'required|integer',
            'title'          => 'required|string|max:191',
            'description'    => 'required|string',
            'qualifications' => 'required|string',
            'expected_salary'=> 'required|string|max:191',
            'apply_email'    => 'required|email'
        ]);


        $id = isset($_GET['ID']) ? intVal($_GET['ID']) : 0;
        return Job::where('id','=',$id)->update([
                'category_id'    => $requets->category_id,
                'type_id'        => $requets->type_id,
                'company_id'     => $requets->company_id,
                'location_id'    => $requets->location_id,
                'title'          => $requets->title,
                'description'    => $requets->description,
                'qualifications' => $requets->qualifications,
                'expected_salary'=> $requets->expected_salary,
                'apply_email'    => $requets->apply_email
            ]);
    }

    public function destroy($id)
    {
        Job::destroy($id);
        return 'Deleted';
    }
}
