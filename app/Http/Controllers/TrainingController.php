<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrainingForm;
use App\Services\CategoryTrainingService;
use App\Services\SourceService;
use App\Services\TrainingService;

class TrainingController extends Controller
{
    protected $service;
    protected $categroyserivce;
    protected $SourcesService;
    public function __construct(TrainingService $service,CategoryTrainingService $categroyserivce, SourceService $SourcesService)
    {
        $this->service = $service;
        $this->SourcesService = $SourcesService;
        $this->categroyserivce = $categroyserivce;
    }

    public function index()
    {
        $cources = $this->service->list();
        // $category = $this->categroyserivce->listTrainingBycategroy();
        $categories = $this->categroyserivce->list();
        return view('dashbordadmin.traing', compact('cources','categories'));
    }

    public function store(TrainingForm $request)
    {
        $data = $request->validated();

        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('trainings', 'public');
        }

        $training = $this->service->create($data);

        return redirect()->back()->with([
            'success' => 'Category created successfully',
            'data'    => $training
        ]);
    }

    public function show($id)
    {
        $training = $id;
        $trainingname = $this->service->detail($id);
        $sources = $this->SourcesService->getSourcesByTrainingId($id);
        return view('dashbordadmin.source', compact('sources','training','trainingname'));
        // return response()->json(['data' => $training], 200);
    }

    public function update(TrainingForm $request, $id)
    {
        $data = $request->validated();
        // dd($data);
        if ($request->hasFile('cover')) {
            $data['cover'] = $request->file('cover')->store('trainings', 'public');
        }

        $training = $this->service->update($id, $data);
// 
        // return response()->json(['message' => 'Category created', 'data' => $training], 201);
        return redirect()->back()->with([
            'success' => 'Training created successfully',
            'data'    => $training
        ]);
    }

    public function destroy($id)
    {
        $training = $this->service->delete($id);
            return redirect()->back()->with([
            'success' => 'Category created successfully',
            'data'    => $training
        ]);
    }
}
