<?php

namespace app\index\controller;

use app\index\model\Article;
use think\Controller;
use think\Db;

class Index extends Controller
{

    protected $article;

    public function __construct()
    {
        parent::__construct();
        $this->article = new Article();
    }

    //TODO : 列表页
    public function index()
    {
        $list = $this->article->getArticleList();
        $this->assign('list', $list);
        return $this->fetch();
    }

    //TODO : 新增留言版页面
    public function create()
    {
        return $this->fetch();
    }

    //TODO : 处理新增留言表单
    public function createform()
    {
        $title   = input("post.title", '');
        $content = input("post.content", '');

        if ($title == '' || $content == '') {
            return json_encode(['code' => 0, 'data' => '', 'msg' => '标题或内容不能为空']);
        }

        $code = $this->article->getArticleInsert($title, $content);

        if ($code == 1) {
            return json_encode(['code' => 200, 'data' => '', 'msg' => '']);
        } else {
            return json_encode(['code' => 0, 'data' => '', 'msg' => '数据添加失败']);
        }

    }














    //TODO : 编辑留言
    public function update($id)
    {
        $data = DB::table('msg_article')
            ->field('id, title, content')
            ->where(array('id' => $id))
            ->find();

        $this->assign('data', $data);
        return $this->fetch();
    }

    //TODO : 处理编辑留言表单
    public function updateform($id)
    {
        $title   = input("post.title", '');
        $content = input("post.content", '');
        $time    = time();

        $id = Db::table('msg_article')
            ->where(array('id' => $id))
            ->update(array('title' => $title, 'content' => $content, 'time' => $time));

        if ($id) {
            $this->success('成功', 'index');
        } else {
            $this->error('失败', 'index');
        }
    }

    //TODO : 删除留言
    public function delete($id)
    {
        $id = DB::table('msg_article')
            ->where(array('id' => $id))
            ->update(array('status' => 0));

        if ($id) {
            $this->success('成功', 'index');
        } else {
            $this->error('失败', 'index');
        }
    }

    //TODO : 查看
    public function view($id)
    {
        DB::table('msg_article')
            ->where(array('id' => $id))
            ->setInc('viewnum');

        $data = DB::table('msg_article')
            ->field('id, title, content, viewnum, time')
            ->where(array('id' => $id))
            ->find();

        $this->assign('data', $data);
        return $this->fetch();
    }

}
