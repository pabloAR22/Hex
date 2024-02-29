<?php

namespace App\Http\Controllers;

use App\Http\Services\RolService;
use Illuminate\Http\Request;

class RolController extends Controller
{
    private $rolService;

    public function __construct()
    {
        $this->rolService = new RolService();
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->rolService->listRols();
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function find(int $id)
    {
        return $this->rolService->findRol($id);
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
            $this->rolService->createRol($request);
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
            $this->rolService->updateRol($id, $request);
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
            $this->rolService->deleteRol($id);
        } catch (\Throwable $th) {
            return ["message" => $th->getMessage()];
        }
    }
}
