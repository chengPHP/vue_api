<?php

namespace App\Http\Controllers\Api;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{

    /*public function getData($search){
        if($search){
            $arr = [
                ['title',"like",'%'.$search.'%']
            ];
            $list = Article::where($arr)->get();
        }else{
            $list = Article::get();
        }
        return $list;
    }*/

    public function getData(Request $request){
        if($request->search){
            $arr = [
                ['title',"like",'%'.$request->search.'%']
            ];
            $list = Article::where($arr)->get();
        }else{
            $list = Article::get();
        }
        return $list;
    }

    public function detail(Request $request){
        $info = Article::find($request->id);
        return response()->json($info);
    }

    public function add(Request $request){
        $article = new Article();
        $article->title = $request->title;
        $article->contents = $request->contents;
        $article->author_name = $request->author_name;
        $article->category_name = $request->category_name;

        if($article->save()){
            $message = [
                'code' => 1,
                'message' => '数据添加成功'
            ];
        }else{
            $message = [
                'code' => 0,
                'message' => '数据添加失败，请稍后重试'
            ];
        }
        return response()->json($message);
    }

    public function delete(Request $request){
        $info = Article::where('id',$request->id)->delete();
        if($info){
            $message = [
                "code" => 1,
                'message' => '此文章删除成功'
            ];
        }else{
            $message = [
                'code' => 0,
                'message' => '此文章删除失败，请稍后重试'
            ];
        }
        return response()->json($message);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
