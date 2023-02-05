<?php

namespace App\Http\Controllers;

use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index(){
        $cards=Card::all();
        return view('card.index',compact('cards'));
    }

    public function create(){
        $categories=Category::where('status','active')->get();
        return view('card.form',compact('categories'));
    }

    public function store(CardRequest $request){
        $centerName = Carbon::now()->timestamp.'.'.$request->file('center_image')->getClientOriginalExtension();
        $request->file('center_image')->storeAs('centerImages',$centerName);

        $coverName = Carbon::now()->timestamp.'.'.$request->file('cover_image')->getClientOriginalExtension();
        $request->file('cover_image')->storeAs('coverImages',$coverName);

        $backName = Carbon::now()->timestamp.'.'.$request->file('center_image')->getClientOriginalExtension();
        $request->file('back_image')->storeAs('backgroundsImages',$backName);

        $bottomName = Carbon::now()->timestamp.'.'.$request->file('center_image')->getClientOriginalExtension();
        $request->file('bottom_image')->storeAs('bottomImages',$bottomName);

        Card::create([
            'title'=>$request->title,
            'category_id'=>$request->category,
            'center_image'=>$centerName,
            'cover_image'=>$coverName,
            'back_image'=>$backName,
            'bottom_image'=>$bottomName,
            'content'=>$request->content,
            'status'=>$request->status
        ]);

        return redirect(route('cards.index'));
    }

    public function edit($id){
        $card=Card::where('id',$id)->first();
        $categories=Category::where('status','active')->get();
        return view('card.form',compact('card','categories'));
    }
    public function update(CardRequest $request,$id){
        $card=Card::where('id',$id)->first();
        @unlink(public_path('storage/centerImages/'.$card->center_image));
        @unlink(public_path('storage/backgroundImages/'.$card->back_image));
        @unlink(public_path('storage/bottomImages/'.$card->bottom_image));

        $centerName = Carbon::now()->timestamp.'.'.$request->file('center_image')->getClientOriginalExtension();
        $request->file('center_image')->storeAs('centerImages',$centerName);

        $coverName = Carbon::now()->timestamp.'.'.$request->file('cover_image')->getClientOriginalExtension();
        $request->file('cover_image')->storeAs('coverImages',$centerName);

        $backName = Carbon::now()->timestamp.'.'.$request->file('center_image')->getClientOriginalExtension();
        $request->file('back_image')->storeAs('backgroundsImages',$backName);

        $bottomName = Carbon::now()->timestamp.'.'.$request->file('center_image')->getClientOriginalExtension();
        $request->file('bottom_image')->storeAs('bottomImages',$bottomName);

        Card::where('id',$id)->update([
            'title'=>$request->title,
            'category_id'=>$request->category,
            'center_image'=>$centerName,
            'cover_image'=>$coverName,
            'bottom_image'=>$bottomName,
            'back_image'=>$backName,
            'content'=>$request->content,
            'status'=>$request->status
        ]);
        return redirect(route('cards.index'));
    }

    public function delete($id){
        Card::where('id',$id)->delete();
        return redirect(route('cards.index'));
    }
}

