<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return '这里是 index 方法';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return '这里是 create 方法';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return '这里是 store 方法';
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
    public function edit(Request $request, $id, $name)
    {
//        $music = $request->input('music');
//        $book = request()->input('book');
//        $str = <<<php
//id:    $id <br>
//name:  $name <br>
//music: $music <br>
//book:  $book <br>
//php;
//        return $str; // 访问URL http://www.lar.test/article/edit/1/%E6%9B%B9%E5%8A%9F%E5%AE%89?music=%E6%9B%BE%E7%BB%8F%E7%9A%84%E4%BD%A0&book=%E5%B9%B3%E5%87%A1%E4%B8%96%E7%95%8C

        dump($request->all());
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
