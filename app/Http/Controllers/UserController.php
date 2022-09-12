<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UserController extends Controller
{
    public function user_list()
    {
        if (\Auth::user()->role != "admin")
            return redirect('dashboard');
        return view('user_list');
    }

    public function ajax_user_list()
    {
        if (\Auth::user()->role != "admin")
            return redirect('dashboard');
        return Datatables::of(\DB::table('users')->select('id', 'username', 'role')->get())->make(true);
    }

    public function edit($id)
    {
        if (\Auth::user()->role != "admin")
            return redirect('dashboard');
        return view('user_edit', compact('id'));
    }

    public function update(Request $request, $id)
    {


        if (\Auth::user()->role != "admin")
            return redirect('dashboard');

        try {
            \DB::transaction(function () use ($id, $request) {
                User::where('id', $id)->update([
                    'username' => request('username')
                ]);

                if ($request->password) {
                    $this->validate($request, [
                        'password' => 'min:6',
                    ]);
                    User::where('id', $id)->update([
                        'password' => bcrypt(request('password'))
                    ]);
                }

                if ($request->user_type) {
                    if (!$request->user_type == 'admin' && !$request->user_type == 'basic') {
                        throw new \Exception();
                    }
                    User::where('id', $id)->update([
                        'role' => request('user_type')
                    ]);
                }
            });
        } catch (\Exception $e) {
//            dd($e);
            session()->flash('password_update', 2);
            return view('user_list');
        }


        session()->flash('password_update', 1);
        return view('user_list');
    }
}
