<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class TestController extends Controller{
    function index(){
        $result = DB::table('ab_testdata')
            ->select('id', 'ab_testname')
            ->get();
        return view('testdata', ['result' => $result]);
    }
}
