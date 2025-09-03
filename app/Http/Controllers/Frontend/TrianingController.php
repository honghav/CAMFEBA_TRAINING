<?php

namespace App\Http\Controllers\Frontend;

use App\Services\CategoryTrainingService;
use App\Http\Controllers\Controller;
use App\Services\SourceService;
use App\Services\TrainingService;
use Illuminate\Http\Request;

class TrianingController extends Controller
{
    protected $categoryService;
    protected $trainingService;
    protected $SourcesService;

    public function __construct(CategoryTrainingService $categoryService, TrainingService $trainingService, SourceService $SourcesService)
    {
        $this->categoryService = $categoryService;
        $this->trainingService = $trainingService;
        $this->SourcesService = $SourcesService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $categories = $this->categoryService->list();
        // return view('Traning.category', compact('categories'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $training = $this->trainingService->detail($id);
        $sources = $this->SourcesService->getSourcesByTrainingId($id);
        return view('Traning.detail', compact('training','sources'));
        // $training = $this->categoryService->listTrainingBycategroy($id);
        // return view('Traning.viewtraining', compact('training'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
