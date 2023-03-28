<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
  
    public function usersList()
    {
        $users = User::paginate();

        return view('usersList', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return view('showUser',compact('user'));
    }

    public function destroy($id)
    {

        User::destroy($id);

        return redirect()->route('usersList');
    }

    public function editUser($id)
    {
        $user = User::find($id);

        return view('editUser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user=request()->except('_token', '_method');

        User::where('id', '=', $id)->update($user);

        return redirect()->route('usersList')
            ->with('success', 'User updated successfully');
    }
}
