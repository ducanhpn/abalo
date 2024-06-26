<?php

namespace App\Http\Controllers\api\v1;

use App\Events\ArticleIsSelled;
use App\Events\Discount;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    //
    public function buy(Request $request){
        //dispatch event
        if(!empty($request->id)){
            ArticleIsSelled::dispatch($request->id);
        }
    }

    public function discount(Request $request){
        //broadcast(new Discount($request->articleId))->toOthers();
        Discount::dispatch($request->articleId);
    }
}
