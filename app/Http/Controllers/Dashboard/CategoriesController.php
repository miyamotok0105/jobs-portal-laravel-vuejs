<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoriesController extends Controller
{
    public function fetch()
    {
        $categories = Category::orderBy('name','asc')->with('jobs')->get();
        return $categories;
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191'
        ]);

        return Category::create([
            'name' => $request['name']
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|string|max:191'
        ]);

        $category = Category::find($id);
        $category->name = $request['name'];
        $category->save();
        return 'Category Update Successfully';
    }

    public function destroy()
    {
        $id = isset($_GET['ID']) ? $_GET['ID'] : 0;
        Category::destroy($id);
        return 'Deleted';
    }
}
