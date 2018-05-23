<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DatabaseController extends Controller
{
    public function insert()
    {
        DB::insert('INSERT INTO articles (category_id,title,content) VALUEs (1, "文章1", "内容1")');
    }
}
