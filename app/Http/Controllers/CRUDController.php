<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CRUDController extends Controller
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
            'name' => 'required|alpha|min:2|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:255'
        ]);

        // Model blade slug.
        $this->slug = 'user';
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
