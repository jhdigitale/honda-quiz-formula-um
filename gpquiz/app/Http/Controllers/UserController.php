<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    //
    public function index(){

        //$registers = Awnsered::where('quiz_id', '=', '1')->distinct('register_id');
        $registers = User::all();
        //dd($registers);

//        dd($registers);
//
//        foreach ($registers as $register){
//            $register->answered($register->id);
//        }


        return view('admin.users.index', compact('registers'));

    }

    public function create(){
        return view('admin.users.create');
    }

    public function edit(User $user){
        return view('admin.users.edit', compact('user'));
    }

    public function store(){

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',

        ]);

        $register = [
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ];

        $user = User::create($register);

        return redirect('/admin/users');

    }

    public function update(User $user)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',

        ]);

        $register = [
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ];

        $user->update($register);

        return redirect('/admin/users');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json($user);
    }




}
