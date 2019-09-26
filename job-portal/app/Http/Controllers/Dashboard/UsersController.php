<?php

namespace App\Http\Controllers\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use DB;

class UsersController extends Controller
{
    public function fetch()
    {
        $users = User::orderBy('name','asc')->get();
        return $users;
    }

    public function profileFetch()
    {
        $userid = isset($_GET['uid']) ? intVal($_GET['uid']) : 0;
        return User::find($userid);
    }


    public function store(Request $request)
    {
        $validateArray = [
                'name'     => 'required|string|max:191',
                'email'    => 'required|string|email|unique:users',
                'password' => 'required|string|min:6'
        ];
        $this->validate($request,$validateArray);

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }


    public function profileUpdate(Request $request)
    {
        if($request->email != Auth::user()->email)
        {
            $validateArray = [
                'name'  => 'required|string|max:191',
                'email' => 'required|string|email|max:191|unique:users'
            ];
        }
        else
        {
            $validateArray = [
                'name'  => 'required|string|max:191',
                'email' => 'required|string|email|max:191'
            ];
        }

        $this->validate($request,$validateArray);
        return User::where('id',Auth::user()->id)->update([
            'name'  => $request->name,
            'email' => $request->email
        ]);
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'oldp' => 'required|string|min:6',
            'newp' => 'required|string|min:6'
        ]);

        $user = User::find(Auth::user()->id);

        if(Hash::check($request->oldp, $user->password))
        {
            $user->password = Hash::make($request->newp);
            $user->save();
            return ['e'=>'suc'];
        }
        else
        {
            return ['e'=>'err'];
        }
    }

    public function destroy($id)
    {
        User::destroy($id);
        return 'Deleted';
    }
}
