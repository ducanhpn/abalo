<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\ServerStatusChanged;

class VueController extends Controller{
    public function index(Request $request){

        $result = DB::table("ab_article")
            ->select('*')
            ->get();

        $srcArr = [];

        $count = DB::table('ab_article')->count();

        for($i = 0; $i < count($result); $i++){
            if(file_exists(public_path("storage/image/") . $i +1 . ".jpg")){
                $srcArr[$i] = "/storage/image/" . $i + 1 . ".jpg";
            }
            else if(file_exists(public_path("storage/image/") . $i +1 . ".png")){
                $srcArr[$i] = "/storage/image/" . $i + 1 . ".png";
            }
        }
        
        return view("indexForVue", ['srcArr' => $srcArr, 'amountArticle' => $count]);
    }
}
