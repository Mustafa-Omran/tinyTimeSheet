<?php

/**
 * User Controller 
 * 
 * @author Mustafa Omran <promustafaomran@hotmail.com>
 */

namespace App\Http\Controllers\APIs;

use Validator;
use App\MO\Models\Role;
use Illuminate\Http\Request;
use App\Repositories\Repository;
use App\Http\Controllers\APIs\BaseController;

class RoleController extends BaseController {

    private $model;

    public function __construct(Role $model) {
        $this->model = new Repository($model);
    }

    /**
     * list all models
     * 
     * 
     */
    public function all() {
        $users = $this->model->all();

        if ($users) {
            return $this->sendResponse($users, 'Success.');
        } else {
            return $this->sendError('Error try again!');
        }
    }

    /**
     * create model
     * 
     * 
     * @param Request $request
     * @return mixed
     */
    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
                    'role' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $role = $this->model->create($request->only('role'));

        if ($role) {
            return $this->sendResponse($role, 'Success.');
        } else {
            return $this->sendError($role, 'Error, try again !');
        }
    }

    /**
     * update model
     * 
     * 
     * @param Request $request
     * @return midex
     */
    public function update(Request $request) {
        $validator = Validator::make($request->all(), [
                    'id' => 'required|exists:roles,id',
                    'role' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $role = $this->model->update($request->only('role'), $request->id);

        if ($role) {
            return $this->sendResponse($role, 'Success.');
        } else {
            return $this->sendError($role, 'Error, try again !');
        }
    }

    /**
     * delete model
     * 
     * 
     * @param Request $request
     * @return mixed
     */
    public function delete(Request $request) {
        $validator = Validator::make($request->all(), [
                    'id' => 'required|exists:roles,id',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $role = $this->model->delete($request->id);

        if ($role) {
            return $this->sendResponse($role, 'Success.');
        } else {
            return $this->sendError($role, 'Error, try again !');
        }
    }

    /**
     * show model
     * 
     * 
     * @param Request $request
     * @return mide
     */
    public function show(Request $request) {
        $validator = Validator::make($request->all(), [
                    'id' => 'required|exists:roles,id',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $role = $this->model->show($request->id);

        if ($role) {
            return $this->sendResponse($role, 'Success.');
        } else {
            return $this->sendError($role, 'Error, try again !');
        }
    }

}
