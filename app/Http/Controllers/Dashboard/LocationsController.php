<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;

class LocationsController extends Controller
{
    public function fetch()
    {
        $locations = Location::orderBy('name','asc')->with('jobs')->get();
        return $locations;
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191'
        ]);

        return Location::create([
            'name' => $request['name']
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191'
        ]);

        $location = Location::find($id);
        $location->name = $request['name'];
        $location->save();
        return 'Location Update Successfully';
    }

    public function destroy($id)
    {
        Location::destroy($id);
        return 'Deleted';
    }
}
