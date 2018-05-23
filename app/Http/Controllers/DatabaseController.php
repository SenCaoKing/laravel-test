<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DatabaseController extends Controller
{
    public function insert()
    {
        /**
         * ①:
         * 不提倡拼接字符串的方式添加数据(此种方式维护麻烦且不安全)
         */
        //DB::insert('INSERT INTO articles (category_id,title,content) VALUEs (1, "文章1", "内容1")');

        /**
         * ②:
         */
        DB::table('articles')->insert([
            [
                'category_id' => 2,
                'title'        => '文章2',
                'content'      => '内容2',
            ],
            [
                'category_id' => 3,
                'title'        => '文章3',
                'content'      => '内容3',
            ],
        ]);



    }
}
