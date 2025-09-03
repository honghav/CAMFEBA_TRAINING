<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryTrainingForm;
use App\Services\CategoryTrainingService;

class CategoryTrainingController extends Controller
{
    protected $service;

    public function __construct(CategoryTrainingService $service)
    {
        $this->service = $service;
    }

    // GET /api/category-trainings
    public function index()
    {
        $categories = $this->service->list();
        return response()->json(['data' => $categories], 200);
    }

    // POST /api/category-trainings
    public function store(CategoryTrainingForm $request)
    {
        $data = $request->validated();

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('categories', 'public');
        }

        $category = $this->service->create($data);

        return response()->json(['message' => 'Category created', 'data' => $category], 201);
    }

    // GET /api/category-trainings/{id}
    public function show($id)
    {
        $category = $this->service->find($id);
        return response()->json(['data' => $category], 200);
    }

    // PUT/PATCH /api/category-trainings/{id}
    public function update(CategoryTrainingForm $request, $id)
    {
        $data = $request->validated();

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('categories', 'public');
        }

        $category = $this->service->update($id, $data);

        return response()->json(['message' => 'Category updated', 'data' => $category], 200);
    }

    // DELETE /api/category-trainings/{id}
    public function destroy($id)
    {
        $this->service->delete($id);
        return response()->json(['message' => 'Category deleted'], 200);
    }
}
