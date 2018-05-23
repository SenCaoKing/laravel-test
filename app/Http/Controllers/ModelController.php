<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ModelController extends Controller
{
    /**
     * 调用模型
     */
    public function index(Article $articleModel) // 此种方式名为:依赖注入
    {
        // 依赖注入方式
        $data = $articleModel->get();
        dump($data->toArray());

        // new实例化方式
        $articleModel = new Article();
        $data = $articleModel->get();
        dump($data->toArray());

        // 静态方法方式
        $data = Article::get();
        dump($data->toArray());
    }

    /**
     * 查询数据
     */
    public function get(Article $articleModel)
    {
        $data = Article::select('category_id', 'title', 'content')
            ->where('title', '<>', '文章1')
            ->whereIn('id', [1, 2, 3])
            ->groupBy('category_id')
            ->orderBy('id', 'desc')
            ->get();
        dump($data->toArray());

        $data = $articleModel->articleList(); // 复用模型方法
        dump($data->toArray());
    }

    /**
     * 插入数据
     */
    public function  store(Article $articleModel)
    {
        $data = [
            'category_id' => 6,
            'title'        => '文章6',
            'content'      => '内容6'
        ];
        $result = $articleModel->create($data);
        dump($result->id);
    }
}
