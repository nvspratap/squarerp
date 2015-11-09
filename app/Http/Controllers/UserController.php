<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return User::all();//
    }

    public function create()
    {
        return view('user');
    }

    public function store(CreateUserRequest $request)
    {
        // User::create($request->all());
        User::create($request->only(['name','email','password']));
        return ['created' => true];
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(CreateUserRequest $request, $id)
    {
        $user = User::find($id);
        if (!$user)
        {
            return ['updated' => false];
        }

        $user->update($request->all());
        return ['updated' => true];
    }

    public function destroy($id)
    {
        User::destroy($id);
        return ['deleted' => true ];
    }
}