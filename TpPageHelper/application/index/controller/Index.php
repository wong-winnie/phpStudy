<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
        $data = Db::table('msg_article')
            ->paginate(10);

        $this->assign('data', $data);
        return $this->fetch();
    }
}
