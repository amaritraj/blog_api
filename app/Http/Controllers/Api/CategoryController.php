<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'Successfully categories retrieved',
            'data' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => 'required|string|unique:categories,name',
        // ]);

        $data = Validator::make($request->all(), [
            'name' => 'required|string|unique:categories',
        ]);

        if ($data->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error',
                'errors' => $data->getMessageBag(),
            ], 422);
        }

        $formData = $data->validated();
        $formData['slug'] = Str::slug($formData['name']);

        $category = Category::create($formData);

        return response()->json([
            'success' => true,
            'message' => 'Successfulloy Category Created.',
            'errors' => $category,
        ]);
    }

    /**
     * Display the specified resource.
     */


    public function show($id)
    {
        $category = Category::find($id);

        //Normal System
        //public function show($id)
        // $category = Category::find($id);

        //public function show(Category $category)
        //$category = Category::find($category);

        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category Not Found',
                'errors' => [],
            ], 404);
        }
        return response()->json([
            'success' => true,
            'message' => 'Successfull',
            'errors' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category Not Found',
                'errors' => [],
            ], 404);
        }

        $data = Validator::make($request->all(), [
            'name' => 'required|string|unique:categories,name,' . $category->id,
        ]);

        if ($data->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error',
                'errors' => $data->getMessageBag(),
            ], 422);
        }

        $formData = $data->validated();
        $formData['slug'] = Str::slug($formData['name']);

        $category->update($formData);

        return response()->json([
            'success' => true,
            'message' => 'Successfulloy Category Update.',
            'errors' => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Category Not Found',
                'errors' => [],
            ], 404);
        }
        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Successfulloy Category Delete.',
            'errors' => [],
        ]);
    }
}
