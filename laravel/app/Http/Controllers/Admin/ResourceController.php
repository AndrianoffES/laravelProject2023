<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Resources\Create;
use App\Models\Category;
use App\Models\Resource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links = Resource::query()->paginate(5);
        return view('admin.resources.index', [
            'links'=>$links
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {
        $link = new Resource($request->validated());
        if ($link->save()){
            return redirect('admin/resources')->with('success', 'Save was successful');
        }
        return back()->with('error', 'Failed to save');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', [
            'resource' => $resource
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Create $request, Resource $resource)
    {
        $link = $resource->fill($request->validated());
        if($link->save()){
            return redirect('admin/resources')->with('success', 'Save was successful');
        }return back()->with('error', 'Failed to save');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $link): JsonResponse
    {
        try{
            $link->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }
}
