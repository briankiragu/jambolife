<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
    * Default clss constructor
    */
    public function __construct(Permission $permission, Request $request)
    {
        // Instantiate the user.
        $this->model = $permission;

        // Instantiate the validator.
        $this->validator = Validator::make($request->all(), [
            'name' => 'required|alpha|min:5|max:255'
        ]);

        // Model blade slug.
        $this->slug = 'permission';
    }
}
