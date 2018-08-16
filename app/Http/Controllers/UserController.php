<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\User;

class UserController extends Controller
{
	public function register(UserRegisterRequest $request)
	{
		$user = new User();
		$user->name = $request->name;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);
		$user->save();

		$data = [
		    "status" => "200",
		    "description" => "User has been created successful.",
		    "user" => new UserResource($user)
		    // "user" => new UserResource(User::find(2))
		];
		return response()->json($data);
	}
}
