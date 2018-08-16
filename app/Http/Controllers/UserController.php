<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
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
		    "description" => "User has been created successful."
		   /* "details" => [
		        "id": 1,
		        "email": "a@a.a",
		        "mobile": "",
		        "source": "",
		        "source_id": "",
		        "message": "Bad Request : Already Logged In"            
		    ]*/
		];
		return response()->json($data);
	}
}
