<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIdeaRequest;
use App\Models\Idea;
use App\Notifications\IdeaPublished;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        $ideas = Idea::where([
              'user_id' => Auth::user()->id,
        ])->get();
        return view('2.ideas.index', [
            'ideas' => $ideas,
        ]);
        */
        $ideas = Auth::user()->ideas;

        return view('2.ideas.index', [
            'ideas' => $ideas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('2.ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIdeaRequest $request)
    {
        /*
        $request->validate([
            'idea' => 'required | string | max:500 | min:10',
            'state' => 'required | in:Pending,Active,Complete'
        ]);
        */
        /*
        Idea::create([
            'idea' => request('idea'),
            'state' => request('state'),
            'user_id' => Auth::user()->id,
        ]);
        */
        $idea = Auth::user()->ideas()->create([
            'idea' => request('idea'),
            'state' => request('state'),
        ]);

        Auth::user()->notify(new IdeaPublished($idea));

        return redirect(route('ideas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        Gate::authorize('isUserIdea', $idea);

        return view('2.ideas.show', [
            'idea' => $idea,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        Gate::authorize('isUserIdea', $idea);

        return view('2.ideas.edit', [
            'idea' => $idea,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Idea $idea)
    {
        Gate::authorize('isUserIdea', $idea);    

        $request->validate([
            'idea' => 'required | string | max:500 | min:10',
            'state' => 'required | in:Pending,Active,Complete'
        ]);

        $idea->update([
            'idea' => request('idea'),
            'state' => request('state'),
        ]);

        return redirect(route('ideas.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        Gate::authorize('isUserIdea', $idea);
    
        $idea::destroy($idea->id);

        return redirect(route('ideas.index'));
    }

    /**
     * Wipes all the data of the table
     */
    public function wipe()
    {
        Auth::user()->isAdmin;

        Idea::truncate();

        return redirect(route('ideas.index'));
    }
}
