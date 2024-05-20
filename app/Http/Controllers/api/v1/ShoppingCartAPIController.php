<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShoppingCartAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$items = DB::table('ab_shoppingcart_item')->where('ab_shoppingcart_id', 1)->get();
        //list article ids


        $articles = DB::table('ab_article')
            ->select('ab_article.*')
            ->join('ab_shoppingcart_item', 'ab_article.id', '=', 'ab_shoppingcart_item.ab_article_id')
            ->where('ab_shoppingcart_item.ab_shoppingcart_id',1)
            ->get();
        return response()->json($articles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Füge die Daten in ab_shoppingcart_item hinzu. Erzeuge ab_shoppingcart id 1 wenn die noch nicht existiert.
        $shoppingcart_id = 1;
        $article_id = $request->input('article_id');
        $date = now();
        DB::insert('insert into ab_shoppingcart (id, ab_creator_id, ab_createdate) values (1, 1, ?) on conflict (id) do nothing',
        [$date]);
        DB::insert('insert into ab_shoppingcart_item (ab_shoppingcart_id,ab_article_id, ab_createdate)
values (?,?,?) on conflict (ab_article_id) do nothing',
            [$shoppingcart_id,$article_id, $date]);
        return response()->json($shoppingcart_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        DB::table('ab_shoppingcart_item')->where('ab_article_id',$id)->delete();
    }
}
