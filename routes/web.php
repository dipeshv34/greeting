<?php

use Carbon\Carbon;
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
Route::get('/',function (){
    $cat=\App\Models\Category::where('status','active')->orderBy('id','desc')->first();
  return redirect(route('front.view',$cat->id));
});

Route::post('change-password',function (\Illuminate\Http\Request $request){
$request
    ->validate(['password' => ['required', 'confirmed']]);
\App\Models\User::where('id',1)->update(['password'=>\Illuminate\Support\Facades\Hash::make($request->password)]);
return view('home');
})->name('password.change');

Route::get('change-password',function (){
    return view('home');
})->name('change-password');

Route::get('view/{id?}',function ($id=null){
    $categories=\App\Models\Category::where('status','active')->orderBy('id','desc')->get();
    if(!isset($id) && $id==null){
      $id=$categories->last()->id;
    }
    $cards=\App\Models\Card::where('category_id',$id)->orderBy('id','desc')->paginate(9);
    $customization=\App\Models\Customization::first();
return view('front.index',compact('categories','cards','customization'));
})->name('front.view');

Route::get('wish-card/{id}/{name?}',function ($id,$name=null){
    $categories=\App\Models\Category::where('status','active')->orderBy('id','desc')->get();
$card=\App\Models\Card::where('id',$id)->first();
    $recentCards=\App\Models\Card::inRandomOrder()->limit(5)->get();
    $customization=\App\Models\Customization::first();
return view('front.card',compact('card','categories','name','customization','recentCards'));
})->name('card.specific');

Route::get('customizations',function (){
    $customization=\App\Models\Customization::first();
    return view('custom-form',compact('customization'));
})->name('custom.form');

Route::post('customizations-save',function (\Illuminate\Http\Request $request){
    $data=\App\Models\Customization::first();
    if(!empty($data)){
        if(!empty($request->file('logo'))){
//            @unlink(public_path('public/logo/'.$data->logo));
            \Illuminate\Support\Facades\Storage::delete('logo/'.$data->logo);
            $centerName = Carbon::now()->timestamp.'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->storeAs('logo',$centerName);
        }
        else{
            $centerName=$data->logo;
        }

        if(!empty($request->file('favicon'))){
            //            @unlink(public_path('public/logo/'.$data->logo));
            \Illuminate\Support\Facades\Storage::delete('favicon/'.$data->favicon);
            $favicon = Carbon::now()->timestamp.'.'.$request->file('favicon')->getClientOriginalExtension();
            $request->file('favicon')->storeAs('favicon',$favicon);
        }
        else{
            $favicon=$data->favicon;
        }
            

        \App\Models\Customization::where('id',$data->id)->update([
            'logo'=>$centerName,
            'favicon'=>$favicon,
            'title'=>$request->title,
            'header_script'=>$request->header_script,
            'header_text'=>$request->header_text,
            'desktop_sidebar_script'=>$request->desktop_sidebar_script,
            'mobile_sidebar_script'=>$request->mobile_sidebar_script,
            'before_content_script'=>$request->before_content_script,
            'after_content_script'=>$request->after_content_script,
            'footer_text'=>$request->footer_text
        ]);
    }
    else{
        if($request->hasFile('logo')){
            $centerName = Carbon::now()->timestamp.'.'.$request->file('logo')->getClientOriginalExtension();
            $request->file('logo')->storeAs('logo',$centerName);
        }

        if($request->hasFile('favicon')){
            $favicon = Carbon::now()->timestamp.'.'.$request->file('favicon')->getClientOriginalExtension();
            $request->file('favicon')->storeAs('favicon',$favicon);
        }

        \App\Models\Customization::create([
            'logo'=>$centerName ?? NULL,
            'favicon'=>$favicon ?? NULL,
            'title'=>$request->title,
            'header_text'=>$request->header_text,
            'header_script'=>$request->header_script,
            'desktop_sidebar_script'=>$request->desktop_sidebar_script,
            'mobile_sidebar_script'=>$request->mobile_sidebar_script,
            'before_content_script'=>$request->before_content_script,
            'after_content_script'=>$request->after_content_script,
            'footer_text'=>$request->footer_text
        ]);
    }
    return redirect()->back()->with('message','Customizations Added successfully');
})->name('custom.save');

Route::get('/admin', function () {
    if(auth()){
        return redirect(route('category.index'));
    }else{
        return view('auth.login');
    }
});
Route::prefix('categories')->middleware('auth')->group(function () {
    Route::get('/',[\App\Http\Controllers\CategoryController::class,'index'])->name('category.index');
    Route::get('create',[\App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
    Route::post('store',[\App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
    Route::get('edit/{id}',[\App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
    Route::post('update/{id}',[\App\Http\Controllers\CategoryController::class,'update'])->name('category.update');
    Route::get('delete/{id}',[\App\Http\Controllers\CategoryController::class,'delete'])->name('category.delete');
});

Route::prefix('cards')->middleware('auth')->group(function () {
    Route::get('/',[\App\Http\Controllers\CardController::class,'index'])->name('cards.index');
    Route::get('create',[\App\Http\Controllers\CardController::class,'create'])->name('cards.create');
    Route::post('store',[\App\Http\Controllers\CardController::class,'store'])->name('cards.store');
    Route::get('edit/{id}',[\App\Http\Controllers\CardController::class,'edit'])->name('cards.edit');
    Route::post('update/{id}',[\App\Http\Controllers\CardController::class,'update'])->name('cards.update');
    Route::get('delete/{id}',[\App\Http\Controllers\CardController::class,'delete'])->name('cards.delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
