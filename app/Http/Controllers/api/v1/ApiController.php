<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = DB::table('ab_article')
                ->select('*')
                ->get();

        return response()->json($result);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        if($request->filled('ab_name') && $request->filled('ab_price') && $request->ab_price > 0 && $request->filled('ab_description')){
            $name = $request->ab_name;
            $price = $request->ab_price;
            $description = $request->ab_description;
            $date = now();
            $count = DB::table('ab_article')->count();
            DB::table('ab_article')->insert(['id' => $count + 1, 'ab_name'=>$name,'ab_price'=>$price, 'ab_description' => $description, 'ab_creator_id' => 1,'ab_createdate'=>$date]);

            return response()->json(['id' => $count+1], 200);
        }
        else{
            return response()->json(['error'=>'error'], 404);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $name)
    {
        //
        if(empty($name)){
            $result = DB::table('ab_article')
                ->select('*')
                ->get();
        }
        else{
            $result = DB::table('ab_article')
            ->select('*')
            ->where('ab_name','ilike','%' . $name. '%')
            ->limit(5)
            ->get();
        }

        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
