<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class TestController extends Controller
{
    function test(){
        return view('ret');
    }
    
    function rec(Request $request){
        $res = $request->all();
        unset($res['_token']);
        unset($res['submit']);
        $ttlsInDB=[];
        forEach(Article::all()->toArray() as $el){
            echo $el['title'];
            array_push($ttlsInDB, $el['title']);
        }
        var_dump($ttlsInDB);
        if(!in_array($request['title'], $ttlsInDB)){
            Article::create($res);
            echo 'added!';
        }
        return redirect()->route('ret');
    }
    function upd(Request $request){
        dump($request->all());
        $res = $request->all();
        $article = Article::find($request['id'], 'id');
        $article->title = $request['title'];
        $article->text = $request['text'];
        $article->save();
        return redirect()->route('ret');

    }
    function show(){
        $articles=Article::all()->toArray();
        return view('ret', compact('articles'));
    }
    function del(Request $request){
        $res = $request->all();
        $article =Article::find($res['id']);
        if(!$article){
            return redirect()->route('ret');
        }
        $article->delete();
        return redirect()->route('ret');
        }

}
