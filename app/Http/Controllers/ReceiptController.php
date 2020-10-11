<?php

namespace App\Http\Controllers;

use App\Models\Receipt;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Mockery\Exception;
use Tests\Feature\ExampleTest;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return response()->json(Receipt::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->only(['name', 'email', 'password']);
        $data['password'] = bcrypt($data['password']);
        return response()->json(Receipt::create($data), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param Receipt $receipt
     * @return JsonResponse
     */
    public function show(Receipt $receipt)
    {
        return response()->json($receipt, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Receipt $receipt
     * @return JsonResponse
     */
    public function update(Request $request, Receipt $receipt)
    {
        return response()->json($receipt->update($request->only(['name', 'url', 'version', 'command'])), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Receipt $receipt
     * @return JsonResponse
     */
    public function destroy(Receipt $receipt)
    {
        try {
            return response()->json($receipt->delete(), 200);
        } catch (\PHPUnit\Exception $exception){
            return response()->json('Could not delete',403);
        }
    }
}
