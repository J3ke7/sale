<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use Lang;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(config('view.paginate'));

        return view('admin/user/index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.user.index')->with([
                'flash_level' => Lang::get('admin.danger'),
                'flash_message' => Lang::get('admin.message.not_found', ['name' => 'User'])
            ]);
        }
        $user->delete();
        
        return redirect()->route('admin.user.index')->with([
            'flash_level' => Lang::get('admin.success'),
            'flash_message' => Lang::get('admin.message.delete_success')
        ]);
    }
}
