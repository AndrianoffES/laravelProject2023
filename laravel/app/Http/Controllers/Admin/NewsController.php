<?php

namespace App\Http\Controllers\Admin;

use App\Enums\News\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\News\Create;
use App\Http\Requests\Admin\News\Edit;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $news = News::query()->with('category')->paginate(5);
        return view('admin.news.index', ['news'=>$news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->select('id', 'title')->get();
        $statuses = StatusEnum::getStatus();
        return \view('admin.news.create', [
            'categories'=>$categories,
            'statuses' =>$statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Create $request)
    {
        //dd($request);
        $news = new News($request->validated());
        if ($news->save()){
            $news->category()->attach($request->getCategoryIds());

            return redirect('admin/news')->with('success', 'Save was successful');
        }
        return back()->with('error', 'Failed to save');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $statuses = StatusEnum::getStatus();
        $categories = Category::all();
        return \view('admin.news.edit',[
            'news'=>$news,
            'categories'=>$categories,
            'statuses'=>$statuses
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Edit $request, News $news)
    {

        $news = $news->fill($request->validated());

        if ($news->save()){
            $news->category()->sync($request->getCategoryIds());

            return redirect('admin/news')->with('success', 'Save was successful');
        }
        return back()->with('error', 'Failed to save');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news): JsonResponse
    {
        try{
            $news->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);

            return \response()->json('error', 400);
        }
    }

}
