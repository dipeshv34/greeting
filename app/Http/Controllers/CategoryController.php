<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
       $categories= Category::all();
        return view('category.index',compact('categories'));
    }

    public function create(){
        return view('category.form');
    }
    public function store(Request $request){
        Category::create([
            'title'=>$request->title,
            'status'=>$request->status,
        ]);

        return redirect(route('category.index'));
    }

    public function edit($id){
       $category= Category::where('id',$id)->first();
        return view('category.form',compact('category'));
    }

   public function update(Request $request, $id){
        Category::where('id',$id)->update([
           'title'=>$request->title,
           'status'=>$request->status
        ]);
      return redirect(route('category.index'));
   }

   public function delete($id){
        Card::where('category_id',$id)->delete();
        Category::where('id',$id)->delete();
       return redirect(route('category.index'));
   }
}
