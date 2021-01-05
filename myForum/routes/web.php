<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ReferenceController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\TopicController;
use App\Http\Resources\Reference as ReferenceResource;
use App\Models\Reference;
use App\Models\Topic;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('homepage');
});

Route::get('/api/references/all', function () {
    return new ReferenceResource(Reference::all());
});

Route::get('/api/references/one/{id?}', function ($id) {
    return new ReferenceResource(Reference::find($id));
});
Route::get('/', 'App\Http\Controllers\HomeController@index');
Route::Resource('opinions',OpinionController::class);
Route::Resource('references',ReferenceController::class);
Route::Resource('roles',RoleController::class);
Route::Resource('states',StateController::class);
Route::Resource('themes',ThemeController::class);
Route::Resource('topics', TopicController::class);

