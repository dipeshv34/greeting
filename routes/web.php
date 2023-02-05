<?php

use Illuminate\Support\Facades\Route;

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
Route::get('view/{id?}',function ($id=null){
    $categories=\App\Models\Category::where('status','active')->get();
    if(!isset($id) && $id==null){
        $id=0;
    }
    $cards=\App\Models\Card::where('category_id',$id)->get();
return view('front.index',compact('categories','cards'));
})->name('front.view');

Route::get('wish-card/{id}/{name?}',function ($id,$name=null){
    $categories=\App\Models\Category::where('status','active')->get();
$card=\App\Models\Card::where('id',$id)->first();
return view('front.card',compact('card','categories','name'));
})->name('card.specific');

Route::get('/admin', function () {
    return view('auth.login');
});
Route::prefix('categories')->group(function () {
    Route::get('/',[\App\Http\Controllers\CategoryController::class,'index'])->name('category.index');
    Route::get('create',[\App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
    Route::post('store',[\App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
    Route::get('edit/{id}',[\App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
    Route::post('update/{id}',[\App\Http\Controllers\CategoryController::class,'update'])->name('category.update');
    Route::get('delete/{id}',[\App\Http\Controllers\CategoryController::class,'delete'])->name('category.delete');
});

Route::prefix('cards')->group(function () {
    Route::get('/',[\App\Http\Controllers\CardController::class,'index'])->name('cards.index');
    Route::get('create',[\App\Http\Controllers\CardController::class,'create'])->name('cards.create');
    Route::post('store',[\App\Http\Controllers\CardController::class,'store'])->name('cards.store');
    Route::get('edit/{id}',[\App\Http\Controllers\CardController::class,'edit'])->name('cards.edit');
    Route::post('update/{id}',[\App\Http\Controllers\CardController::class,'update'])->name('cards.update');
    Route::get('delete/{id}',[\App\Http\Controllers\CardController::class,'delete'])->name('cards.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
