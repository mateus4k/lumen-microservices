<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return $this->validResponse($users);
    }

    public function store(Request $request)
    {
        $rules = [
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ];

        $this->validate($request, $rules);

        $fields             = $request->only(['name', 'email', 'password']);
        $fields['password'] = Hash::make($request->get('password'));

        $user = User::create($fields);

        return $this->validResponse($user, Response::HTTP_CREATED);
    }

    public function show($user)
    {
        $user = User::findOrFail($user);


        return $this->validResponse($user);
    }

    public function update(Request $request, $user)
    {
        $rules = [
            'name'     => 'max:255',
            'email'    => 'email|unique:users,email,' . $user,
            'password' => 'min:8|confirmed',
        ];

        $this->validate($request, $rules);

        $user = User::findOrFail($user);

        $user->fill($request->only(['name', 'email', 'password']));

        if ($request->has('password')) {
            $user->password = Hash::make($request->get('password'));
        }

        if ($user->isClean()) {
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();

        return $this->validResponse($user);
    }

    public function destroy($user)
    {
        $user = User::findOrFail($user);

        $user->delete();

        return $this->validResponse($user);
    }
}
