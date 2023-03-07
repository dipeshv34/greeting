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
            'content_color'=>$request->content_color,
            'bottom_contents'=>$request->bottom_contents,
            'seo_content'=>$request->seo_content,
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
        try{
            $card=Card::where('id',$id)->first();
            if(!empty($request->file('center_image'))) {
                \Illuminate\Support\Facades\Storage::delete('centerImages/'.$card->center_image);
                $centerName = Carbon::now()->timestamp.'.'.$request->file('cover_image')->getClientOriginalExtension();
                $request->file('center_image')->storeAs('centerImages',$centerName);
            }else{
                $centerName=$card->center_image;
            }

            if(!empty($request->file('cover_image'))) {
                \Illuminate\Support\Facades\Storage::delete('coverImages/'.$card->cover_image);
                $coverName = Carbon::now()->timestamp.'.'.$request->file('cover_image')->getClientOriginalExtension();
                $request->file('cover_image')->storeAs('coverImages',$coverName);
            }else{
                $coverName =$card->cover_image;
            }


            if(!empty($request->file('back_image'))) {
                \Illuminate\Support\Facades\Storage::delete('backgroundsImages/'.$card->back_image);
                $backName = Carbon::now()->timestamp.'.'.$request->file('back_image')->getClientOriginalExtension();
                $request->file('back_image')->storeAs('backgroundsImages',$backName);
            }else{
                $backName =$card->back_image;
            }

            if(!empty($request->file('bottom_image'))) {
                \Illuminate\Support\Facades\Storage::delete('bottomImages/'.$card->bottom_image);
                $bottomName = Carbon::now()->timestamp.'.'.$request->file('bottom_image')->getClientOriginalExtension();
                $request->file('bottom_image')->storeAs('bottomImages',$bottomName);
            }else{
                $bottomName =$card->bottom_image;
            }


            Card::where('id',$id)->update([
                'title'=>$request->title,
                'category_id'=>$request->category,
                'center_image'=>$centerName,
                'cover_image'=>$coverName,
                'bottom_image'=>$bottomName,
                'back_image'=>$backName,
                'content'=>$request->content,
                'content_color'=>$request->content_color,
                'bottom_contents'=>$request->bottom_contents,
                'seo_content'=>$request->seo_content,
                'status'=>$request->status
            ]);
            return redirect(route('cards.index'));
        }catch (\Exception $e){
            dd($e);
        }
    }

    public function delete($id){
        Card::where('id',$id)->delete();
        return redirect(route('cards.index'));
    }
}

