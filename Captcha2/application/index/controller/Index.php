<?php

namespace app\index\controller;

use think\Controller;
use Gregwar\Captcha\CaptchaBuilder;

class Index extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function doCaptcha()
    {
        $captcha = new CaptchaBuilder;
        CaptchaBuilder::create()->build()->output();
    }
}
