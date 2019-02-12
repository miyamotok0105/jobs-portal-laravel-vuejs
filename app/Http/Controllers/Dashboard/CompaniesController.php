<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Company;

class CompaniesController extends Controller
{
    public function fetch()
    {
        $companies = Company::orderBy('name','asc')->with('jobs')->get();
        return $companies;
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191'
        ]);

        return Company::create([
            'name' => $request['name']
        ]);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191'
        ]);

        $company = Company::find($id);
        $company->name = $request['name'];
        $company->save();
        return 'Company Updated Successfully';
    }

    public function destroy($id)
    {
        Company::destroy($id);
        return 'Deleted';
    }

}
