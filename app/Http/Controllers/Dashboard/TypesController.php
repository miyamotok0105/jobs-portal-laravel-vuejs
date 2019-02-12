<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;

class TypesController extends Controller
{
    public function fetch()
    {
        $types = Type::orderBy('name','asc')->with('jobs')->get();
        return $types;
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191'
        ]);

        return Type::create([
            'name' => $request['name']
        ]);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191'
        ]);

        $type = Type::find($id);
        $type->name = $request['name'];
        $type->save();
        return 'Types Updated Successfully';
    }

    public function destroy($id)
    {
        Type::destroy($id);
        return 'Deleted';
    }
}
