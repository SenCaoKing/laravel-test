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
        // ① 直接查询
        $data = Article::select('category_id', 'title', 'content')
            ->where('title', '<>', '文章1')
            ->whereIn('id', [1, 2, 3])
            ->groupBy('category_id')
            ->orderBy('id', 'desc')
            ->get();
        dump($data->toArray());

        // ② 实例化模型类
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
        $id = $articleModel->create($data)->id;
        dump($id);
    }

    /**
     * 修改数据
     */
    public function update(Article $articleModel)
    {
        $id = 6;
        $data = [
          'category_id' => 2,
          'title'      => '文章6',
           'content'   => '内容666',
        ];
        $result = $articleModel->where('id', $id)->update($data);
        dump($result);
    }

    /**
     * 删除数据
     */
    public function delete(Article $articleModel)
    {
        $id = 6;
        $result = $articleModel->where('id', $id)->delete();
        dump($result);

        // withTrashed() 查询带有软删除的数据
        $data = Article::withTrashed()->get();
        dump($data->toArray());

        // 只查软删除的数据
        $data = Article::onlyTrashed()->get();
        dump($data->toArray());

        // restore() 恢复删除
        $articleModel->where('id', $id)->restore();

        // forceDelete() 彻底删除
        $articleModel->where('id', $id)->forceDelete();
    }
}
