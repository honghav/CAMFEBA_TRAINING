<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryTrainingForm;
use App\Services\CategoryTrainingService;

class CategoryController extends Controller
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
        return view('dashbordadmin.category', compact('categories'));
        // return response()->json(['data' => $categories], 200);
    }

    // POST /api/category-trainings
    public function store(CategoryTrainingForm $request)
    {
        $data = $request->validated();

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('categories', 'public');
        }
        $category = $this->service->create($data);
        return redirect()->back()->with([
            'success' => 'Category created successfully',
            'data'    => $category
        ]);
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

        return redirect()->back()->with([
                    'success' => 'Category created successfully',
                    'data'    => $category
                ]); 
   }

    // DELETE /api/category-trainings/{id}
    public function destroy($id)
    {
        $category = $this->service->delete($id);
        return redirect()->back()->with([
            'success' => 'Category created successfully',
            'data'    => $category
        ]);
    }
}
