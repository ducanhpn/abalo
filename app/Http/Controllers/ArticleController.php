<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Schema\ValidationException;

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

    //validation
    public function store(Request $request){
        //clean data
        $name = $request->post("name");
        $name = trim($name);
        $price  = (int)$request->post("price");
        $description = $request->post("description");

        //validate data
        if(empty($name) || $price <=0 || strcmp($name,"böse") == 0){
            //throw ValidationException::withMessage(['error' => 'Fehler']);
            return response()->json(['error' => 'Fehler'], 404);
        }
        else{
            $date = now();
            $count = DB::table('ab_article')->count();
            DB::table('ab_article')->insert(['id' => $count + 1, 'ab_name'=>$name,'ab_price'=>$price, 'ab_description' => $description, 'ab_creator_id' => 1,'ab_createdate'=>$date]);
            //return $this->index($request); // call index function
            return response()->json(['success' => 'Erfolgreich'], 200);
        }

    }
}
