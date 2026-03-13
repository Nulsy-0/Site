<?php

use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AuthController;
use App\Models\Idea;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('1.welcome', [
        'greeting' => 'Hello',
        'user' => request('user', 'World'),
        'tasks' => [
            'Vai para casa!',
            'Compra ração!',
            'Passea o cão!',
        ],
    ]);
});

Route::view('/about', '1.about');
Route::view('/contact', '1.contact');

//-----------------------------------------------------------------------------------------------//

Route::prefix('ideas')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/register', [AuthController::class, 'viewRegister'])->name('auth.register.view');
        Route::post('/register', [AuthController::class, 'register'])->name('auth.register');
        Route::get('/login', [AuthController::class, 'viewLogin'])->name('auth.login.view');
        Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    });

    Route::middleware('auth')->group(function () {
        Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

        Route::get('/admin', function () {
            return 'Área restrita';
        })->can('admin')->name('ideas.adimn');

        Route::get('/', [IdeaController::class, 'index'])->name('ideas.index');
        Route::get('/create', [IdeaController::class, 'create'])->name('ideas.create');
        Route::post('/', [IdeaController::class, 'store'])->name('ideas.store');
        Route::get('/{idea}', [IdeaController::class, 'show'])->name('ideas.show');
        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');
        Route::patch('/{idea}', [IdeaController::class, 'update'])->name('ideas.update');
        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy');
        Route::get('/wipe', [IdeaController::class, 'wipe'])->name('ideas.wipe');
    });
});


/* Moved to IdeaController ⬇

// index
Route::get('/ideas', function (){
    //$ideas = session()->get('ideas', []);
    //$ideas = DB::table('ideas')->get();

    $ideas = Idea::all();
    
    return view('2.ideas.index', [
        'ideas' => $ideas,
    ]);
    
})->name('ideas');


// show
Route::get('/ideas/{idea}', function (Idea $idea){

    //$idea = Idea::findOrFail($id);
    
    return view('2.ideas.show', [
        'idea' => $idea,
    ]);
    
})->name('ideas.show');


// create
Route::get('/ideas/create', function (){
    return view('2.ideas.create');
})->name('ideas.create');


// edit
Route::get('/ideas/{idea}/edit', function (Idea $idea){
    
    return view('2.ideas.edit', [
        'idea' => $idea,
    ]);
    
})->name('ideas.edit');


// update
Route::patch('/ideas/{idea}', function (Idea $idea){
    
    $idea->update([
        'idea' => request('idea'),
    ]);
    
    return redirect("/ideas/{$idea->id}");
    
})->name('ideas.update');


// store
Route::post('/ideas', function(){
    
    Idea::create([
        'idea' => request('idea'),
    ]);

    return redirect(route('ideas'));
})->name('ideas.new');


// destroy
Route::delete('/ideas/{idea}', function(Idea $idea){
    
    $idea::destroy($idea->id);

    return redirect(route('ideas'));
})->name('ideas.destroy');


// wipe
Route::get('/destroy-ideas', function(){
    Idea::truncate();

    return redirect(route('ideas'));
})->name('ideas.wipe');
*/