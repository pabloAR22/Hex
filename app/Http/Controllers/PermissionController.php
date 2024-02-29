<?php

namespace App\Http\Controllers;

use App\Http\Services\permissionService;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $permissionService;

    public function __construct()
    {
        $this->permissionService = new permissionService();
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->permissionService->listPermissions();
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function find(int $id)
    {
        return $this->permissionService->findPermission($id);
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
            $this->permissionService->createPermission($request);
        } catch (\Throwable $th) {
            return ["message" => $th->getMessage()];
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JsonModel  $jsonModel
     * @return \Illuminate\Http\Response
     */
    public function update(int $id, Request $request)
    {
        try {
            $this->permissionService->updatePermission($id, $request);
        } catch (\Throwable $th) {
            return ["message" => $th->getMessage()];
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JsonModel  $jsonModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        try {
            $this->permissionService->deletePermission($id);
        } catch (\Throwable $th) {
            return ["message" => $th->getMessage()];
        }
    }
}
