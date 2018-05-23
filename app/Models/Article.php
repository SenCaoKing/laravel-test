<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
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
    protected $guarded = []; // $fillable 和 $guarded 只能定义一个

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
