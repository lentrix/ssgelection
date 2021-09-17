<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('users.index',['users'=>null]);
    }

    public function search(Request $request) {
        $users = User::where('lname','like',"%$request->key%")->get();

        return view('users.index', compact('users'));
    }

    public function store(Request $request) {
        $request->validate([
            'idnum' => 'required|string',
            'lname' => 'required|string',
            'fname' => 'required|string',
            'program' => 'required|string',
            'year' => 'required|string',
            'dept' => 'required|string',
        ]);

        User::create($request->all());
    }

    public function edit(User $user) {
        return view('users.edit', compact('user'));
    }

    public function update(User $user, Request $request) {
        $user->update($request->all());

        return redirect('/users')->with('Info','User has been updated.');
    }
}
