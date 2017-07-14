<?php

namespace App\Http\Controllers;

use App\User;
use Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
    * Default clss constructor
    */
    public function __construct(User $user, Request $request)
    {
        // Instantiate the user.
        $this->model = $user;

        // Instantiate the validator.
        $this->validator = Validator::make($request->all(), [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|min:9|max:12|unique:users',
            'dob' => 'required|date',
            'identification' => 'required|string|max:10|unique:users'
        ]);

        // Model blade slug.
        $this->slug = 'user';
    }

    /**
     * undocumented function
     *
     * @return void
     * @author 
     **/
    public function getUsersByRole($role, $chunk_size = 15)
    {
    	return view($this->slug .'.index', [
            'payload' => [
                $this->slug .'s' => $this->model->role($role)->paginate($chunk_size),
                'message' => ''
            ],
            'status' => http_response_code()
        ]);
    }
}
