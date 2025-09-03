<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SourceForm;
use App\Services\SourceService;

class SourceController extends Controller
{
    protected $service;

    public function __construct(SourceService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $sources = $this->service->list();
        
        return view('dashbordadmin.traing', compact('sources'));
    }

    public function store(SourceForm $request)
    {
        $data = $request->validated();

        if ($request->hasFile('images')) {
            $paths = [];
            foreach ($request->file('images') as $file) {
                $paths[] = $file->store('sources', 'public');
            }
            $data['images'] = $paths;
        }

        $source = $this->service->create($data);
        return redirect()->back()->with([
            'success' => 'Sources created successfully',
            'data'    => $source
        ]);
        // return response()->json(['message' => 'Source uploaded', 'data' => $source], 201);
    }

    public function show($id)
    {
        $source = $this->service->find($id);
        return response()->json(['data' => $source], 200);
    }

    public function update(SourceForm $request, $id)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('sources', 'public');
        }

        $source = $this->service->update($id, $data);

        // return response()->json(['message' => 'Source updated', 'data' => $source], 200);
    }

    public function destroy($id)
    {
        $source = $this->service->delete($id);
        return redirect()->back()->with([
            'success' => 'Sources created successfully',
            'data'    => $source
        ]);
        // return response()->json(['message' => 'Source deleted'], 200);
    }
}
