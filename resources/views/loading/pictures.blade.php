<style>
    html {
        height: 100%;
    }

    body {
        background-color: #f7f7f7;
        background-image: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PHJhZGlhbEdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgY3g9IjUwJSIgY3k9IjUwJSIgcj0iMTAwJSI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIvPjxzdG9wIG9mZnNldD0iMjUlIiBzdG9wLWNvbG9yPSIjZWVlZWVlIi8+PHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjYWFhYWFhIi8+PC9yYWRpYWxHcmFkaWVudD48L2RlZnM+PHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgZmlsbD0idXJsKCNncmFkKSIgLz48L3N2Zz4g');
        background-size: 100%;
        background-image: -moz-radial-gradient(50% 50%, circle, #ffffff, #eeeeee 25%, #aaaaaa);
        background-image: -webkit-radial-gradient(50% 50%, circle, #ffffff, #eeeeee 25%, #aaaaaa);
        background-image: radial-gradient(circle at 50% 50%, #ffffff, #eeeeee 25%, #aaaaaa);
        overflow: hidden;
    }

    .images {
        cursor: pointer;
    }
    .images:hover .image:nth-child(4) {
        -moz-transform: rotate(10deg) translateX(50px);
        -ms-transform: rotate(10deg) translateX(50px);
        -webkit-transform: rotate(10deg) translateX(50px);
        transform: rotate(10deg) translateX(50px);
    }
    .images:hover .image:nth-child(3) {
        -moz-transform: rotate(3deg) translateX(75px);
        -ms-transform: rotate(3deg) translateX(75px);
        -webkit-transform: rotate(3deg) translateX(75px);
        transform: rotate(3deg) translateX(75px);
    }
    .images:hover .image:nth-child(2) {
        -moz-transform: rotate(-2deg) translateX(-50px);
        -ms-transform: rotate(-2deg) translateX(-50px);
        -webkit-transform: rotate(-2deg) translateX(-50px);
        transform: rotate(-2deg) translateX(-50px);
    }
    .images:hover .image:first-child {
        -moz-transform: rotate(-8deg) translateX(-75px) translateY(-10px);
        -ms-transform: rotate(-8deg) translateX(-75px) translateY(-10px);
        -webkit-transform: rotate(-8deg) translateX(-75px) translateY(-10px);
        transform: rotate(-8deg) translateX(-75px) translateY(-10px);
    }

    .image {
        position: absolute;
        top: 50%;
        left: 50%;
        height: 200px;
        width: 200px;
        margin-top: -110px;
        margin-left: -105px;
        border: 5px solid #fff;
        border-bottom-width: 15px;
        -moz-box-shadow: 0 2px 5px rgba(30, 30, 30, 0.25);
        -webkit-box-shadow: 0 2px 5px rgba(30, 30, 30, 0.25);
        box-shadow: 0 2px 5px rgba(30, 30, 30, 0.25);
        z-index: 2;
        -moz-transition: -moz-transform 0.3s ease-in-out;
        -o-transition: -o-transform 0.3s ease-in-out;
        -webkit-transition: -webkit-transform 0.3s ease-in-out;
        transition: transform 0.3s ease-in-out;
    }
    .image:first-child {
        -moz-transform: rotate(8deg);
        -ms-transform: rotate(8deg);
        -webkit-transform: rotate(8deg);
        transform: rotate(8deg);
    }
    .image:nth-child(2) {
        -moz-transform: rotate(2deg);
        -ms-transform: rotate(2deg);
        -webkit-transform: rotate(2deg);
        transform: rotate(2deg);
    }
    .image:nth-child(3) {
        -moz-transform: rotate(-3deg);
        -ms-transform: rotate(-3deg);
        -webkit-transform: rotate(-3deg);
        transform: rotate(-3deg);
    }
    .image:nth-child(4) {
        -moz-transform: rotate(-10deg);
        -ms-transform: rotate(-10deg);
        -webkit-transform: rotate(-10deg);
        transform: rotate(-10deg);
    }
    .image:last-child {
        -moz-transform: rotate(-5deg);
        -ms-transform: rotate(-5deg);
        -webkit-transform: rotate(-5deg);
        transform: rotate(-5deg);
    }
    .image.slide-right {
        -moz-transform: rotate(290deg) translateX(250px);
        -ms-transform: rotate(290deg) translateX(250px);
        -webkit-transform: rotate(290deg) translateX(250px);
        transform: rotate(290deg) translateX(250px);
    }
    .image.slide-left {
        -moz-transform: rotate(-290deg) translateX(-250px);
        -ms-transform: rotate(-290deg) translateX(-250px);
        -webkit-transform: rotate(-290deg) translateX(-250px);
        transform: rotate(-290deg) translateX(-250px);
    }
    .image.back {
        z-index: 1;
    }

</style>
<div class='images'>
    <img class='image' src='https://picsum.photos/id/239/230/230'>
    <img class='image' src='https://picsum.photos/id/240/230/230'>
    <img class='image' src='https://picsum.photos/id/241/230/230'>
    <img class='image' src='https://picsum.photos/id/242/230/230'>
    <img class='image' src='https://picsum.photos/id/243/230/230'>
</div>

<script>
    (function () {
        var cssTransition, imageOffset, imageWidth, images, queue, timeout, touch;

        cssTransition = function () {
            var body, i, len, style, vendor, vendors;
            body = document.body || document.documentElement;
            style = body.style;
            vendors = ['Moz', 'Webkit', 'O'];
            if (typeof style['transition'] === 'string') {
                return true;
            }
            for (i = 0, len = vendors.length; i < len; i++) {if (window.CP.shouldStopExecution(0)) break;
                vendor = vendors[i];
                if (typeof style[vendor + 'Transition'] === 'string') {
                    return true;
                }
            }window.CP.exitedLoop(0);
            return false;
        };

        queue = false;

        touch = document.documentElement['ontouchstart'] !== void 0;

        images = document.querySelector('.images');

        imageWidth = images.firstElementChild.offsetWidth;

        imageOffset = images.firstElementChild.offsetLeft;

        timeout = cssTransition() ? [300, 400] : [0, 0];

        images.addEventListener(touch ? 'touchend' : 'click', function (event) {
            var direction, lastClassList;
            if (queue) {
                return;
            }
            queue = true;
            if ((touch ? event.changedTouches[0].pageX : event.pageX) - imageOffset > imageWidth / 2) {
                direction = 'slide-right';
            } else {
                direction = 'slide-left';
            }
            lastClassList = images.lastElementChild.classList;
            lastClassList.add(direction);
            return setTimeout(function () {
                lastClassList.remove(direction);
                lastClassList.add('back');
                return setTimeout(function () {
                    images.insertBefore(images.lastElementChild, images.firstElementChild);
                    lastClassList.remove('back');
                    return queue = false;
                }, timeout[0]);
            }, timeout[1]);
        }, false);

    }).call(this);

</script>
