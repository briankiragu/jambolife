<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// use Psr\Http\Message\ServerRequestInterface as Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Model resource object.
     */
    protected $model;

    /**
     * Validator object.
     */
    protected $validator;

    /**
     * Resource blade string name.
     */
     protected $slug;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response([
            'payload' => $this->model->all(),
            'status' => 200
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->slug .'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Validate the user input
            if ($this->validator->fails()) {
                return response([
                    'payload' => $this->validator->errors()->getMessages(),
                    'status' => 422
                 ]);
            }

            // Create the instance
            $action = $this->model->create($request->all());

            // Return a success response
            return response([
                'payload' => 'Successfully created the '. $this->slug,
                'status' => 201
            ]);

        } catch (Exception $e) {
            return response([
                'payload' => $e->getMessage(),
                'status' => 401
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response([
            'payload' => $this->model->find($id),
            'status' => 200
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view($this->slug .'edit', [
            'payload' => $this->model->find($id),
            'status' => 200
        ]);
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
        try {
            // Validate the user input
            if ($this->validator->fails()) {
                return response([
                    'payload' => $this->validator->errors()->getMessages(),
                    'status' => 422
                 ]);
            }

            // Create the instance
            $action = $this->model->updateOrCreate(
                ['id' => $id],
                $request->all()
            );

            // Return a success response
            return response([
                'payload' => 'Successfully updated the '. $this->slug,
                'status' => 200
            ]);

        } catch (Exception $e) {
            return response([
                'payload' => $e->getMessage(),
                'status' => 401
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            // Delete the model object from the database.
            $this->model->destroy($id);

            return response([
                'payload' => 'Successfully deleted the '. $this->slug,
                'status' => 200
            ]);
        } catch (Exception $e) {
            return response([
                'payload' => $e->getMessage(),
                'status' => 401
            ]);
        }
    }
}
