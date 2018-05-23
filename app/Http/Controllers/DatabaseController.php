<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DatabaseController extends Controller
{
    /**
     * 插入数据
     */
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

    /**
     * 查询数据
     */
    public function get()
    {
        /**
         * get方法 获取数据
         */
        // $data = DB::table('articles')->get();  // 获取全部数据(二维数组)

        /**
         * where 方法 --- 条件(可接受三个参数)
         * ->where('id', '<>', 1)
         * 第一个参数：字段名
         * 第二个参数：符号
         * 第三个参数：值
         */
        // $data = DB::table('articles')->where('id', 1)->get(); // 获取 id值为1的数据

        // $data = DB::table('articles')->where('id', '<>', 1)->get(); // 获取 id值不为1的数据

        /**
         * whereIn('id', [1, 2, 3])(可接受两个参数)
         * 第一个参数：字段名
         * 第二个参数：数组
         * whereNotIn()、whereBetween()同理
         */
        // $data = DB::table('articles')->whereIn('id', [1, 2, 3])->get(); // 获取 id值在数组[1，2，3]里的数据

        /**
         * join 查询
         * ->join('users as u', 'u.id', 'articles.user_id')
         * ->leftJoin('users as u', 'u.id', 'articles.user_id')
         * ->rightJoin('users as u', 'u.id', 'articles.user_id')
         */

        /**
         * 分组、排序
         * groupBy('u.id')
         *
         * orderBy('created_at', 'desc')
         */

        /**
         * select() 获取指定字段
         * ->select('u.id', 'u.name', 'u.email');
         */

        /**
         * first() 方法
         * 获取一条数据(一维数组)
         */
         // $data = DB::table('articles')->where('id', 3)->first();

        /**
         * ->pluck('content', 'title')
         * 第一个参数：字段
         * 第二个参数：用来做 key (可选)
         */
        // $data = DB::table('articles')->pluck('content', 'title');

        /**
         * ->value('title')
         * 获取一个值
         */
        // $data = DB::table('articles')->where('id', 2)->value('title');

        // 完整示例
//        $data = DB::table('articles')
//            ->select('category_id', 'title', 'content')
//            ->where('title', '<>', '文章1')
//            ->whereIn('id', [1, 2, 3])
//            ->groupBy('category_id')
//            ->orderBy('id', 'desc')
//            ->limit(1)
//            ->get();
//        dump($data);

        $data = DB::table('articles')
            ->select('category_id', 'title', 'content')
            ->where('title', '<>', '文章1')
            ->whereIn('id', [1, 2, 3])
            ->groupBy('category_id')
            ->orderBy('id', 'desc')
            ->limit(1)
            ->get();
        dump($data);
    }




}
