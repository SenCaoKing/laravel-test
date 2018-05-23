<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * 文章列表
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $title = '文章列表';
        $article = Article::withTrashed()
            ->orderBy('id', 'desc')
            ->get();
        $assign = [
            'title'   => $title,
            'article' => $article,
        ];
        // $assign = compact('title','article'); // compact()函数简化 $assign(效果同上)
        // dump($assign);
        return view('article.index', $assign);
    }

    /**
     * 新增文章页面
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $title = '新增文章';
        $assign = compact('title');
        return view('article.create', $assign);
    }

    /**
     * 新增文章
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        Article::create($data);
        return redirect('view/index');
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
     * 编辑文章页面
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
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
