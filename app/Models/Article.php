<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;

    // $fillable 和 $guarded 只能定义一个
    /**
     * 允许赋值的字段
     *
     * @var array
     */
    // protected $fillable = ['category_id', 'title', 'content'];

    /**
     * 不允许赋值的字段
     *
     * @var array
     */
    protected $guarded = []; // 空数组 表示任何字段都可赋值

    /**
     * 获取文章列表
     *
     * @return mixed
     */
    public function articleList()
    {
        $data = $this->select('category_id', 'title', 'content')
            ->where('title', '<>', '文章1')
            ->whereIn('id', [1, 2, 3])
            ->groupBy('category_id')
            ->orderBy('id', 'desc')
            ->get();
        return $data;
    }
}
