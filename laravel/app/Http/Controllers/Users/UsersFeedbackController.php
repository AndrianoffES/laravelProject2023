<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateFeedback;
use App\Models\UserFeedback;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class UsersFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(CreateFeedback $request)
    {
      //  dd($request->all());
        $feedback = new UserFeedback($request->validated());
        if($feedback->save()){
            return redirect('/home')->with('success', 'Thank you! Your feedback was saved');
        }

        return back()->with('error', 'Something went wrong');

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
