<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $ideas = Idea::query()
            ->latest()
            ->paginate(15);

        return view('ideas.index', [
            'title' => 'Ideas',
            'ideas' => $ideas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('ideas.create', [
            'title' => 'New idea',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIdeaRequest $request): RedirectResponse
    {
        $idea = Idea::query()->create($request->validated());

        return redirect()
            ->route('ideas.show', $idea)
            ->with('success', 'Idea created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea): View
    {
        return view('ideas.show', [
            'title' => $idea->title,
            'idea' => $idea,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea): View
    {
        return view('ideas.edit', [
            'title' => 'Edit idea',
            'idea' => $idea,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIdeaRequest $request, Idea $idea): RedirectResponse
    {
        $idea->update($request->validated());

        return redirect()
            ->route('ideas.show', $idea)
            ->with('success', 'Idea updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea): RedirectResponse
    {
        $idea->delete();

        return redirect()
            ->route('ideas.index')
            ->with('success', 'Idea deleted.');
    }
}
