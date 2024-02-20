<?php

namespace App\Http\Controllers\Api;

use App\Models\Mem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Mem::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mem = Mem::create([
            ...$request->validate([
                "title" => "required|string",
                "description" => "nullable|string",
                "upvotes" => "required|integer",
                "downvotes" => "required|integer",
                "img" => "required|string",
            ]),
            'user_id' => 1
        ]);

        return $mem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Mem::where("id", $id)->first();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mem $mem)
    {
        return $mem->update(
            $request->validate([
                "title" => "sometimes|string",
                "description" => "nullable|string",
                "upvotes" => "sometimes|integer",
                "downvotes" => "sometimes|integer",
                "img" => "sometimes|string",
            ])
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
