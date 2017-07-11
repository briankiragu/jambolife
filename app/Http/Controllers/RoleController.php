<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
    * Default clss constructor
    */
    public function __construct(Role $role, Request $request)
    {
        // Instantiate the user.
        $this->model = $role;

        // Instantiate the validator.
        $this->validator = Validator::make($request->all(), [
            'name' => 'required|alpha|min:5|max:255'
        ]);

        // Model blade slug.
        $this->slug = 'role';
    }
}
