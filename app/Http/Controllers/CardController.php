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
        $centerName=null;
        $coverName=null;
        $backName=null;
        $bottomName=null;

        if(!empty($request->file('center_image'))){
            $centerName = Carbon::now()->timestamp.'.'.$request->file('center_image')->getClientOriginalExtension();
            $request->file('center_image')->storeAs('centerImages',$centerName);
        }

        if(!empty($request->file('cover_image'))) {
            $coverName = Carbon::now()->timestamp . '.' . $request->file('cover_image')->getClientOriginalExtension();
            $request->file('cover_image')->storeAs('coverImages', $coverName);
        }

        if(!empty($request->file('back_image'))) {
            $backName = Carbon::now()->timestamp . '.' . $request->file('back_image')->getClientOriginalExtension();
            $request->file('back_image')->storeAs('backgroundsImages', $backName);
        }

        if(!empty($request->file('bottom_image'))) {
            $bottomName = Carbon::now()->timestamp . '.' . $request->file('bottom_image')->getClientOriginalExtension();
            $request->file('bottom_image')->storeAs('bottomImages', $bottomName);
        }

        Card::create([
            'title'=>isset($request->title) ? $request->title : null,
            'category_id'=>isset($request->category) ? $request->category : null,
            'center_image'=>!empty($centerName) ? $centerName :null,
            'cover_image'=>!empty($coverName) ? $coverName :null,
            'back_image'=>!empty($backName) ? $backName : null,
            'bottom_image'=>!empty($bottomName) ? $bottomName : null,
            'content'=>isset($request->content) ? $request->content :null,
            'content_color'=>isset($request->content_color) ? $request->content_color :null,
            'wishing_title'=>isset($request->wishing_title) ? $request->wishing_title :null,
            'bottom_contents'=>isset($request->bottom_contents) ? $request->bottom_contents :null,
            'seo_content'=>isset($request->seo_content) ? $request->seo_content : null,
            'status'=>isset($request->status) ? $request->status : null
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
                $centerName = Carbon::now()->timestamp.'.'.$request->file('center_image')->getClientOriginalExtension();
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
                'title'=>isset($request->title) ? $request->title : null,
                'category_id'=>isset($request->category) ? $request->category :null,
                'center_image'=>$centerName,
                'cover_image'=>$coverName,
                'bottom_image'=>$bottomName,
                'back_image'=>$backName,
                'content'=>isset($request->content) ? $request->content : null,
                'content_color'=>isset($request->content_color) ? $request->content_color : null,
                'wishing_title'=>isset($request->wishing_title) ? $request->wishing_title : null,
                'bottom_contents'=>isset($request->bottom_contents) ? $request->bottom_contents : null,
                'seo_content'=>isset($request->seo_content) ? $request->seo_content : null,
                'status'=>isset($request->status) ? $request->status : null
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

