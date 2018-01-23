<?php

class VerificationCode
{
    private $charset = "abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789";  //随机因子
    public $code;  //验证码
    private $codelen = 4; //验证码长度
    private $width = 130; //宽度
    private $height = 50; //高度
    private $img;   //图像资源句柄
    private $font;  //制定字体
    private $fontSize = 20;   //字体大小
    private $fontColor;       //字体颜色

    public function __construct()
    {
        //制定字体
        $this->font = 'msjh.ttf';//注意字体路径要写对，否则显示不了图片
    }

    //生成验证码
    private function createCode()
    {
        $len = strlen($this->charset) - 1;
        for ($i = 0; $i < $this->codelen; $i++) {
            $this->code .= $this->charset[mt_rand(0, $len)];
        }
    }

    //生成背景
    private function createBg()
    {
        $this->img = imagecreatetruecolor($this->width, $this->height);
        //imagecreatetruecolor — 新建一个真彩色图像
        $color = imagecolorallocate($this->img, mt_rand(157, 255), mt_rand(157, 255), mt_rand(157, 255));
        //imagecolorallocate — 为一幅图像分配颜色
        imagefilledrectangle($this->img, 0, $this->height, $this->width, 0, $color);
    }

    //生成文字
    private function createFont()
    {
        //每个字符的平均宽度
        $x = $this->width / $this->codelen;
        for ($i = 0; $i < $this->codelen; $i++) {
            //字体的颜色
            $this->fontColor = imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
            imagettftext($this->img, $this->fontSize, mt_rand(-10, 10), $i * $x + mt_rand(1, 3), $this->height / 1.3, $this->fontColor, $this->font, $this->code[$i]);
            //imagestring($this->img,5,$i*$x+mt_rand(1,5),5,$this->code[$i],$this->fontColor);
        }
    }

    //生成线条、雪花
    private function createDisturb()
    {
        for ($i = 0; $i < 6; $i++) {
            $color = imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
            imageline($this->img, mt_rand(0, $this->width), mt_rand(0, $this->width), mt_rand(0, $this->width), mt_rand(0, $this->width), $color);
            //imageline() 用 color 颜色在图像 image 中从坐标 x1，y1 到 x2，y2（图像左上角为 0, 0）画一条线段。
        }
        for ($i = 0; $i < 100; $i++) {
            $color = imagecolorallocate($this->img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
            imagestring($this->img, mt_rand(1, 5), mt_rand(0, $this->width), mt_rand(0, $this->height), '*', $color);
            //imagestring — 水平地画一行字符串
        }
    }

    //输出
    private function outPut()
    {
        header("Content-Type:image/png");
        imagepng($this->img);
        imagedestroy($this->img);
    }

    //显示验证码
    public function showCode()
    {

        $this->createBg();
        echo $this->code;
        $this->createCode();
        //$_SESSION['code'] = $this->getCode();
        $this->createDisturb();
        $this->createFont();
        $this->outPut();
    }

    //获取验证码
    public function getCode()
    {
        return strtolower($this->code);
    }
}

$code = new VerificationCode();
$code->showCode();