<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <title>Webuploader</title>
    <style>
        .default_face {
            width: 150px;
            height: 150px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="library/webuploader/webuploader.css">
    <script type="text/javascript" src="js/jquery-1.8.3.js"></script>
    <script type="text/javascript" src="library/webuploader/webuploader.js"></script>
</head>

<body>

<img id="face1" class="default_face" src="images/b_default.jpg">
<br>
<img id="face2" src="images/s_default.jpg">
<div id="picker"></div>
上传进度:<span id="upload_progress"></span>

</body>

<script>

    //缩略图
    var upload_thumb = '';

    // 初始化Web Uploader
    var uploader = WebUploader.create({

        // swf文件路径
        swf: "/library/webuploader/Uploader.swf",
        // 文件接收服务端。
        server: './fileserver.php',
        // 是否自动上传。
        auto: true,
        //设置文件上传域的name
        fileVal: 'file',

        //指定选择文件的按钮容器，不指定则不创建按钮
        pick: {
            id: "#picker",     //这里虽然写的是 id, 但是不是只支持 id, 还支持 class, 或者 dom 节点
            innerHTML: '上传文件',
            multiple: false  //是否开启多图上传
        },

        //指定接受哪些类型的文件
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        },

        //是否要分片上传
        // chunked: true,
        //如果要分片，分多大一片(KB)
        //chunkSize: 100 * 1024 * 1024,

        //验证文件总数量, 超出则不允许加入队列
        //fileNumLimit: 1,
        ///去重， 根据文件名字、文件大小和最后修改时间来生成hash Key
        //duplicate: true,
        //限制单文件大小(KB)
        fileSingleSizeLimit: 5 * 1024 * 1024 * 1024

    });

    // 当有文件被添加进队列的时候
    uploader.on('fileQueued', function (file) {

        //上传进度
        uploader.onUploadProgress = function (file, percentage) {
            if (percentage != 1) {
                a = percentage.toFixed(4);
                b = a.slice(2, 4) + "." + a.slice(4, 6) + "%";
                c = b.replace(/^0/, '');
                $("#upload_progress").html(c);
            }
        };

        //缩略图
        uploader.makeThumb(file, function (error, src) {
            if (error) {
                return;
            }
            upload_thumb = src;
        }, 150, 150);

    });

    //验证错误(文件类型, 大小......)
    //Q_EXCEED_NUM_LIMIT  验证文件总数量, 超出则不允许加入队列
    //Q_EXCEED_SIZE_LIMIT 验证单个文件大小是否超出限制, 超出则不允许加入队列
    // F_EXCEED_SIZE      验证文件总数量, 超出则不允许加入队列
    // F_DUPLICATE去重    根据文件名字、文件大小和最后修改时间来生成hash Key.
    uploader.on('error', function (type) {
        if (type == 'Q_EXCEED_NUM_LIMIT') {
            alert("上传文件个数上限");
        } else if (type == 'F_EXCEED_SIZE') {
            alert("上传文件超出大小");
        } else if (type == 'Q_TYPE_DENIED') {
            alert("文件类型错误")
        }
    })

    //上传错误
    uploader.on('uploadError', function (file, reason) {
        //console.log(reason);
        alert("上传出错");
    });

    //    //当文件上传成功时触发
    //    uploader.on('uploadSuccess', function (file) {
    //        $("#face2").attr('src', upload_thumb)
    //        $("#upload_progress").html('100%');
    //    });

    //当某个文件上传到服务端响应后，会派送此事件来询问服务端响应是否有效。
    //如果此事件handler返回值为false, 则此文件将派送server类型的uploadError事件
    uploader.on('uploadAccept', function (object, ret) {
        if (ret.code == 0) {
            //原图
            $("#face1").attr('src', './upload/' + ret.uploadimg);
            //缩略图
            $("#face2").attr('src', upload_thumb);
            $("#upload_progress").html('100%');
        } else {
            alert("上传出错");
            //错误信息说明 : http://php.net/manual/zh/features.file-upload.errors.php
            //console.log(ret.code);
        }
    })

</script>

</body>
</html>