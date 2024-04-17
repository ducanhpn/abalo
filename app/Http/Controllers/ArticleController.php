<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    //
    public function index(Request $request){
        if(empty($request->search)){
            $result = DB::table('ab_article')
                ->select('*')
                ->get();
        }
        else{
            $result = DB::table('ab_article')
                ->select('*')
                ->where('ab_name','ilike','%' . $request->search . '%')
                ->get();
        }

        return view('articlesTable',['result'=>$result]);
    }
}
