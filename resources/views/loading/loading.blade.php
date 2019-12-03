<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" Content="text/html; charset=utf-8;">
    <title>CSS3实现加载的动画效果1</title>
    <meta name="author" content="rainna" />
    <meta name="keywords" content="rainna's css lib" />
    <meta name="description" content="CSS3" />
    <style>
        *{margin:0;padding:0;}
        body{background:#535353;}

        .m-load,.m-load2{width:36px;height:36px;margin:100px auto;}
        .m-load{background:url('load-v1.gif') #535353 center center no-repeat;}
        .m-load2{background:#535353;}

        /** 加载动画的静态样式 **/
        .m-load2{position:relative;}
        .m-load2 .line div{position:absolute;left:16px;top:0;width:3px;height:36px;}
        .m-load2 .line div:before,.m-load2 .line div:after{content:'';display:block;height:50%;background:#fcfcfc;border-radius:5px;}
        .m-load2 .line div:nth-child(2){-webkit-transform:rotate(30deg);}
        .m-load2 .line div:nth-child(3){-webkit-transform:rotate(60deg);}
        .m-load2 .line div:nth-child(4){-webkit-transform:rotate(90deg);}
        .m-load2 .line div:nth-child(5){-webkit-transform:rotate(120deg);}
        .m-load2 .line div:nth-child(6){-webkit-transform:rotate(150deg);}
        .m-load2 .circlebg{position:absolute;left:50%;top:50%;width:18px;height:18px;margin:-9px 0 0 -9px;background:#535353;border-radius:18px;}

        /** 加载动画 **/
        @-webkit-keyframes load{
            0%{opacity:0;}
            100%{opacity:1;}
        }
        .m-load2 .line div:nth-child(1):before{-webkit-animation:load 1.2s linear 0s infinite;}
        .m-load2 .line div:nth-child(2):before{-webkit-animation:load 1.2s linear 0.1s infinite;}
        .m-load2 .line div:nth-child(3):before{-webkit-animation:load 1.2s linear 0.2s infinite;}
        .m-load2 .line div:nth-child(4):before{-webkit-animation:load 1.2s linear 0.3s infinite;}
        .m-load2 .line div:nth-child(5):before{-webkit-animation:load 1.2s linear 0.4s infinite;}
        .m-load2 .line div:nth-child(6):before{-webkit-animation:load 1.2s linear 0.5s infinite;}
        .m-load2 .line div:nth-child(1):after{-webkit-animation:load 1.2s linear 0.6s infinite;}
        .m-load2 .line div:nth-child(2):after{-webkit-animation:load 1.2s linear 0.7s infinite;}
        .m-load2 .line div:nth-child(3):after{-webkit-animation:load 1.2s linear 0.8s infinite;}
        .m-load2 .line div:nth-child(4):after{-webkit-animation:load 1.2s linear 0.9s infinite;}
        .m-load2 .line div:nth-child(5):after{-webkit-animation:load 1.2s linear 1s infinite;}
        .m-load2 .line div:nth-child(6):after{-webkit-animation:load 1.2s linear 1.1s infinite;}
    </style>
</head>

<body>
<div class="m-load"></div>

<div class="m-load2">
    <div class="line">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
    <div class="circlebg"></div>
</div>
</body>
</html>
