<?php

//TODO : msg_article - 留言板表

namespace app\index\model;

use think\Db;

class Article
{

    //TODO : 列表页
    public function getArticleList()
    {
        return Db::query("select id, title, time, viewnum from msg_article where status='A' order by time desc limit 10");
    }

    //TODO : 新增留言板
    public function getArticleInsert($title, $content)
    {
        $time = time();
        return Db::execute("insert into msg_article (`title`, `content`, `time`) VALUES ('$title', '$content', '$time')");
    }

}