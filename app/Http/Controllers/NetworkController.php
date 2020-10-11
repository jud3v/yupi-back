<?php

namespace App\Http\Controllers;

use App\Models\Network;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use PHPUnit\Exception;

class NetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Network::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json(Network::create($request->all()), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Network $network
     * @return JsonResponse
     */
    public function show(Network $network)
    {
        return response()->json($network);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Network $network
     * @return bool
     */
    public function update(Request $request, Network $network)
    {
        return $network->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Network $network
     * @return JsonResponse
     */
    public function destroy(Network $network)
    {
        try {
            return response()->json( $network->delete(), 200);
        } catch (Exception $exception){
            return response()->json('Could not delete resources', 403);
        }
    }
}
