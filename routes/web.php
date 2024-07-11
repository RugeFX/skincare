<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DosDontsController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuestionOptionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $articles = App\Models\Article::all();
    return view('welcome', compact('articles'));
});

Route::get('/question', [QuestionController::class, 'index'])->name('question');
Route::post('/question/next', [QuestionController::class, 'nextQuestion'])->name('question.next');
Route::post('/question/prev', [QuestionController::class, 'prevQuestion'])->name('question.prev');
Route::get('/result', [QuestionController::class, 'result'])->name('result');
Route::delete('/reset', [QuestionController::class, 'reset'])->name('reset');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article');

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('category', CategoryController::class)->except('show');
    Route::resource('dos-donts', DosDontsController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('article', ArticleController::class)->except('show');
    Route::post('article/media', [ArticleController::class, 'deleteMedia'])->name('article.media.delete');

    Route::group([
        'prefix' => 'question',
        'as' => 'question.',
    ], function () {
        Route::resource('/', QuestionOptionController::class)->except(['create', 'show', 'edit'])->parameter('', 'question');
        Route::resource('{question}/option', OptionController::class)->except(['create', 'show', 'edit']);
    });
});
