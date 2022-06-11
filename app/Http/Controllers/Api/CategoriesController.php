<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoriesController extends Controller
{
    public function index() {
        $data = [
            'categoeies' => Category::orderBy('id', 'desc')->get()
        ];

        return response()->json([
            'status' => 'OK',
            'data' => $data
        ]);
    }

    public function create(Request $request)
    {
        $name = $request->input('name');

        try {
            Category::create([
                'name' => $name
            ]);

            return response()->json([
                'status' => 'OK'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'ERROR'
            ]);
        }

    }
}
