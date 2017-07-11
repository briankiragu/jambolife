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
    public function index()
    {
        return view($this->slug .'.index', [
            'payload' => [
                $this->slug => $this->model->all(),
                'message' => ''
            ],
            'status' => http_response_code()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->slug .'.create');
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
                return redirect()->route($this->slug .'.create')
                                ->withErrors($this->validator)
                                ->withInput();
            }

            // Create the instance and assign it to a variable.
            $resource = $this->model->create($request->all());

            // Return a success redirect response.
            return redirect()->route($this->slug .'.show', ['id' => $resource->id])->with([
                'payload' => [
                    $this->slug => $resource,
                    'message' => 'Successfully created the '. $this->slug
                ],
                'status' => http_response_code()
            ]);

        } catch (Exception $e) {
            return redirect()->route($this->slug .'.create')
                            ->withErrors($e->getMessage())
                            ->withInput();
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
        return view($this->slug .'.show', [
            'payload' => [
                $this->slug => $this->model->find($id),
                'message' => ''
            ],
            'status' => http_response_code()
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
        return view($this->slug .'.edit', [
            'payload' => $this->model->find($id),
            'status' => http_response_code()
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
            if ($this->validator->fails()) {
                return redirect()->route($this->slug .'.edit', ['id' => $id])->with([
                    'payload' => $this->model->find($id),
                    'status' => http_response_code()
                ])
                ->withErrors($this->validator)
                ->withInput();
            }

            // Update the instance.
            $action = $this->model->updateOrCreate(
                ['id' => $id],
                $request->all()
            );

            // Return a success redirect response.
            return redirect()->route($this->slug .'.show', ['id' =>$id])->with([
                'payload' => [
                    $this->slug => $this->model->find($id),
                    'message' => 'Successfully updated the '. $this->slug
                ],
                'status' => http_response_code()
            ]);

        } catch (Exception $e) {
            return redirect()->route($this->slug .'.edit', ['id' => $id])->with([
                    'payload' => $this->model->find($id),
                    'status' => http_response_code()
                ])
                ->withErrors($e->getMessage())
                ->withInput();
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

            return redirect()->route($this->slug .'.index', [
                'payload' => [
                    $this->slug => $this->model->all(),
                    'message' => 'Successfully deleted the '. $this->slug
                ],
                'status' => http_response_code()
            ]);
        
        } catch (Exception $e) {
            return redirect()->route($this->model .'show', ['id' => $id])->with([
                'payload' => [
                    $this->slug => $this->model->find($id),
                    'message' => $e->getMessage()
                ],
                'status' => http_response_code()
            ]);
        }
    }
}
