<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
        // DB::insert('INSERT INTO articles (category_id,title,content) VALUEs (1, "文章1", "内容1")');

        /**
         * ②: table 方法
         */
        DB::table('articles')->insert([
            [
                'category_id'  => 2,
                'title'        => '文章2',
                'content'      => '内容2',
            ],
            [
                'category_id'  => 3,
                'title'        => '文章3',
                'content'      => '内容3',
            ],
        ]);
    }

    /**
     * 查询数据
     */
    public function get(Article $articleModel)
    {
        /**
         * get方法 获取数据
         */
        /*
        $data = DB::table('articles')->get();  // 获取全部数据(集合)
        dump($data);
        */

        /**
         * where 方法 --- 查询条件(可接受三个参数)
         * ->where('id', '<>', 1)
         * 第一个参数：字段名
         * 第二个参数：符号
         * 第三个参数：值
         */
        /*
        $data = DB::table('articles')
            ->where('id', 1)
            ->get(); // 获取 id值为1的数据
        dump($data);

        $data = DB::table('articles')
            ->where('id', '<>', 1)
            ->get(); // 获取 id值不为1的数据
        dump($data);
        */

        /**
         * whereIn('id', [1, 2, 3]) (可接受两个参数)
         * 第一个参数：字段名
         * 第二个参数：数组
         *
         * whereNotIn()、whereBetween() 同理
         */
        /*
        $data = DB::table('articles')
            ->whereIn('id', [1, 2, 3])
            ->get(); // 获取 id 值在数组[1，2，3]里的数据
        dump($data);
        */

        /**
         * join 查询 (可接受三个参数)
         * ->join('users as u', 'u.id', 'articles.user_id')
         * 第一个参数：关联的表名(可以使用as定义别名)
         * 第二个参数：关联的字段
         * 第三个参数：关联的字段
         *
         * leftJoin()、rightJoin() 同理
         */
        /*
        $data = DB::table('articles')
            ->join('users as u', 'u.id', 'articles.user_id')
            ->whereIn('u.id', [1, 2, 3])
            ->get();
        dump($data);
        */

        /**
         * 分组、排序
         * groupBy('u.id')
         *
         * orderBy('created_at', 'desc')
         */

        /**
         * 获取指定字段
         * ->select('u.id', 'u.name', 'u.email');
         */
        /*
        $data = DB::table('articles')
            ->select('title', 'content')
            ->get();
        dump($data);
        */

        /**
         * first() 方法
         * 获取一条数据(一维数组)
         */
        /*
        $data = DB::table('articles')->where('id', 3)->first();
        dump($data);
        */

        /**
         * ->pluck('content', 'title') 可去重
         * 第一个参数：字段
         * 第二个参数：用来做 key (可选)
         */
        /*
        $data = DB::table('articles')->pluck('content', 'title');
        dump($data);
        */

        /**
         * ->value('title')
         * 获取一个值
         */
        /*
        $data = DB::table('articles')
            ->where('id', 2)
            ->value('title');
        dump($data);
        */

        // 完整示例
        /*
        $data = DB::table('articles')
            ->select('category_id', 'title', 'content')
            ->where('title', '<>', '文章1')
            ->whereIn('id', [1, 2, 3])
            ->groupBy('category_id')
            ->orderBy('id', 'desc')
            ->limit(1)
            ->get();
        */

        // 模型方法
        $data = $articleModel->articleList();
        dump($data->toArray());
    }

    /**
     * 测试集合(collection)和数组(array)
     */
    public function test()
    {
        $array = [
            '', '酷', 'Sen', 0, 'Cao', false, 'King', null, '很', '帅'
        ];
        dump($array);

        // 数组转 collect
        $collect = collect($array);
        dump($collect);

        // 简单循环输出
        /*
        foreach ($collect as $k => $v) {
            dump($v);
        }
        */

        // 过滤、拼接操作
        /**
         * ① 数组方式
         * unset() 释放/销毁 给定的变量
         * array_filter() 过滤为假的值
         * implode() 将一维数组转化为字符串
         */
        /*
        unset($array[1]);
        dump(implode('-', array_filter($array)));
        */

        /**
         * ② 集合方式
         * forget() 删除
         * filter() 过滤为假的值
         * implode() 用 - 连接
         */
        // dump($collect->forget(1)->filter()->implode('-'));

        // 查询链式操作
        $data = DB::table('articles')
            ->where('id', '>', 1)
            ->get()
            ->pluck('title')
            ->implode('-');
        dump($data);

    }
}
